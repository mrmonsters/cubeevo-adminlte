<?php namespace App\Http\ViewComposers;

use App\Models\Status;
use Illuminate\Contracts\View\View;

use App\Models\Post;
use App\Models\Project;
use App\Models\Setting;


class HomeComposer
{

    protected $_post;
    protected $_project;
    protected $_postCollection = null;
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
        $posts = $this->_getAllActivePosts(3);
        $projects = Project::where('delete', '=', 0)
            ->where('status', '=', Status::ACTIVE)->whereIn('id', array_values($featured_project_arr))->get();
        $char_count = (\Session::get('locale') == 'en') ? 120 : 50;
//dd($projects);
        return $view->with(compact('posts', 'projects', 'char_count'));
    }

}