var app = angular.module('gymApp', [])
    .config(function ($interpolateProvider) {
        $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
    }).controller('clientsSearchController', function ($scope, $http, $timeout) {
        var timer;
        $scope.state = { inProgress: false };
        $scope.clientCode = '';

        $scope.$watch('clientCode', function(){
            searchClients();
        });

        function searchClients () {
            if (timer) {
                $timeout.cancel(timer);
            }

            if ($scope.clientCode.length <= 1)
                return;

            timer = $timeout(doRequest, 1000);
        }

        function doRequest() {
            $scope.state.inProgress = true;
            $http({
                url: routes.clients_search,
                method: "GET",
                params: {code: $scope.clientCode}
            }).success(function(data) {
                $scope.clients = data;
                $scope.state.inProgress = false;
            });

        }

    });

app.directive('bgSrc', function(){
    return function(scope, element, attrs){
        var url = attrs.bgSrc;
        element.css({
            'background-image': 'url(' + url +')',
            'background-size' : 'cover'
        });
    };
});