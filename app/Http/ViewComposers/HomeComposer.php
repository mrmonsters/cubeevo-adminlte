<?php namespace App\Http\ViewComposers;

use App\Models\Status;
use Illuminate\Contracts\View\View;

use App\Models\Post;
use App\Models\Project;
use App\Models\Setting;
use DB;


class HomeComposer
{

    protected $_post;
    protected $_project;
    protected $_postCollection = null;
    protected $_randomPostCollection = null;
    protected $_projectCollection = null;

    protected function _getAllActivePosts($qty = null)
    {
        if (!$this->_postCollection) {

            $this->_postCollection = $this->_post
                ->where('deleted', '=', 0)
                ->where('status', '=', Status::ACTIVE)
                ->orderBy('created_at', 'desc');

            if ($qty && is_numeric($qty)) {

                $this->_postCollection->take($qty);
            }
        }

        return $this->_postCollection->get();
    }

    protected function _getAllActiveRandomPosts($qty = null)
    {
        if (!$this->_randomPostCollection) {

            $this->_randomPostCollection = $this->_post
                ->where('deleted', '=', 0)
                ->where('status', '=', Status::ACTIVE)
                ->orderBy(DB::raw('RAND()'));

            if ($qty && is_numeric($qty)) {

                $this->_randomPostCollection->take($qty);
            }
        }

        return $this->_randomPostCollection->get();
    }

    protected function _getAllActiveProjects($qty = null)
    {
        if (!$this->_projectCollection) {

            $this->_projectCollection = $this->_project
                ->where('delete', '=', 0)
                ->where('status', '=', Status::ACTIVE)
                ->orderBy('created_at', 'desc');

            if ($qty && is_numeric($qty)) {

                $this->_projectCollection->take($qty);
            }
        }

        return $this->_projectCollection->get();
    }

    public function __construct(Post $post, Project $project)
    {
        $this->_post = $post;
        $this->_project = $project;
    }

    public function hex2rgb($hex)
    {
        $hex = str_replace("#", "", $hex);

        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }
        $rgb = array($r, $g, $b);
        //return implode(",", $rgb); // returns the rgb values separated by commas
        return $rgb; // returns an array with the rgb values
    }

    public function compose(View $view)
    {

        $featured_project_ids = Setting::where('code', 'homepage_featured_project')->first();
        $featured_project_arr = explode(',', $featured_project_ids->value);
        $order_query = 'FIELD(id';
        foreach ($featured_project_arr as $k => $v){
            $order_query .= ',"'.$v.'"';
        }
        $order_query .= ')';
        $posts = $this->_getAllActivePosts(3);
        $randomPosts = $this->_getAllActiveRandomPosts(3);
        $projects = Project::where('delete', '=', 0)
            ->where('status', '=', Status::ACTIVE)->whereIn('id', array_values($featured_project_arr))
            ->orderByRaw($order_query)->get();


        $sub_featured_project_ids = Setting::where('code', 'sub_homepage_featured_project')->first();
        $sub_featured_project_arr = explode(',', $sub_featured_project_ids->value);
        $sub_featured_order_query = 'FIELD(id';
        foreach ($sub_featured_project_arr as $k => $v){
            $sub_featured_order_query .= ',"'.$v.'"';
        }
        $sub_featured_order_query .= ')';
        $sub_homepage_projects = Project::where('delete', '=', 0)
            ->where('status', '=', Status::ACTIVE)->whereIn('id', array_values($sub_featured_project_arr))
            ->orderByRaw($sub_featured_order_query)->get();


        $char_count = (\Session::get('locale') == 'en') ? 120 : 50;
        return $view->with(compact('posts', 'projects', 'char_count','sub_homepage_projects','randomPosts'));
    }

}