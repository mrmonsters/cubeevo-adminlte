(function () {
    "use strict";

    cubeevo.service('ReviewService', ['$resource', 'CONST', function ($resource, CONST) {

        return $resource(CONST.API_PREFIX + 'job-reviews/:id', { id: '@_id' }, {
            update: {
                method:           'POST',
                transformRequest: formDataObject,
                headers:          {
                    'Content-Type': undefined,
                    enctype:        'multipart/form-data'
                },
                params:           {id: '@id'}
            }
        });
    }]);
}) ();