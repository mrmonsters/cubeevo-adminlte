var cubeevo;

(function() {
    "use strict";

    cubeevo = angular
        .module('cubeevo', ['ngResource'])
        .constant('CONST', {
            API_PREFIX: "http://" + location.host + "/api/v1/",
            ADMIN_BASE: "http://" + location.host + "/admin"
        });
}) ();

function formDataObject (data) {

    var fd = new FormData();

    angular.forEach(data, function (value, key) {

        fd.append(key, value);
    });

    return fd;
}