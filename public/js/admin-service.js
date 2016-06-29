(function () {
    "use strict";

    cubeevo.service('ReviewService', ['$resource', 'CONST', function ($resource, CONST) {

        return $resource(CONST.API_PREFIX + 'job-reviews/:id', { id: '@_id' }, {
            update: {
                method: 'POST',
                params: {id: '@id'}
            }
        });
    }]);
}) ();