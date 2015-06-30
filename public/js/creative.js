angular
	.module("Creative", ["ngRoute", 'ngAnimate', "ngFileUpload", "ui.bootstrap", 'angular-loading-bar'])
	
	/* Config */
	.config(['$routeProvider', '$sceDelegateProvider', '$sceProvider',
		function($routeProvider, $sceDelegateProvider, $sceProvider) {
			$routeProvider
				.when("/"   , { templateUrl: "templates/result/ExamView.html"  , controller: "ResultsController"})
				.when("/:id", { templateUrl: "templates/result/ResultView.html", controller: "ResultController" });
			$sceDelegateProvider.resourceUrlWhitelist([
				'self',
				'*://www.youtube.com/**'
			]);
		}
	])
	/* End of Config */

	/* Gallery Page */
	.controller("GalleryController", ['$scope', '$http', "$modal",
		function($scope, $http, $modal){
			// Pagination
	        $scope.pagination = {
	        	page 		: 1,
				isVisible   : 1,
	        	itemPerPage : 16,
				isReverse	: true,
	        	type 		: 'media',
				orderBy  	: 'created_at',
				total       : 1
	        }
		    $scope.setPage = function(){ loadPage(); }
	        $scope.showByType = function(type){
	        	$scope.pagination.type = type;
	        	loadPage();
	        }
		    // Fetching the Data
			var loadPage = function(){
				$http.get("files/", {params:$scope.pagination}).success(function(data){
					$scope.fileEntries = data.data;
					$scope.pagination.total = data.total;
	        	});
	        }
		    loadPage();

		    // Open the ImageViewer
			$scope.open = function (index, size) {
				var modalInstance = $modal.open({
					templateUrl: 'templates/ImageViewer.html',
					controller: 'ImageViewerController',
					size: size,
					resolve: {
						info: function () {
							return {
								fileEntries : $scope.fileEntries,
								index : index
							};
						}
					}
				});
				setTimeout(function(){ document.getElementById("imageViewer").focus(); }, 100);
			};
		}
	])
	.controller('ImageViewerController', ["$scope", "$http", "$modalInstance", "info",
		function($scope, $http, $modalInstance, info) {
			$scope.fileEntry = info.fileEntries[info.index];
			setTimeout(function(){ $http.get("files/incrementhits/" + $scope.fileEntry.id); }, 100);
			
			$scope.next = function () {
				info.index = (info.index + 1)%info.fileEntries.length;
				$scope.fileEntry = info.fileEntries[info.index];
				setTimeout(function(){ $http.get("files/incrementhits/" + $scope.fileEntry.id); }, 100);
			};
			$scope.prev = function () {
				info.index = (info.index == 0)? info.fileEntries.length-1 : info.index - 1;
				$scope.fileEntry = info.fileEntries[info.index];
				setTimeout(function(){ $http.get("files/incrementhits/" + $scope.fileEntry.id); }, 100);
			};
			$scope.controls = function($event) {
					 if($event.keyCode == 37) $scope.prev();
				else if($event.keyCode == 39) $scope.next();
			};
		}
	])
	/* End of Gallery Page */

	/* Document Page */
	.controller("DocumentsController", ['$scope', '$http', "$modal",
		function($scope, $http, $modal){
			// Pagination
	        $scope.pagination = {
	        	page 		: 1,
				isVisible 	: 1,
				total       : 1,
	        	itemPerPage : 18,
				isReverse 	: true,
	        	type 		: 'file',
				orderBy  	: 'created_at'
	        }
		    $scope.setPage = function(){ loadPage(); }
	        $scope.showByType = function(type){
	        	$scope.pagination.type = type;
	        	loadPage();
	        }
		    // Fetching the Data
			var loadPage = function(){
				$http.get("files/", {params:$scope.pagination}).success(function(data){
					$scope.files = data.data;
					$scope.pagination.total = data.total;
	        	});
	        }
		    loadPage();
		    // Opening the Downloader
			$scope.open = function(index, size) {
				var modalInstance = $modal.open({
					templateUrl: 'myModalContent.html',
					controller: 'DownloadController',
					size: size,
					resolve: {
						info: function () {
							return {
								id: $scope.files[index].id
							}
						}
					}
				});
			};
		}
	])
	.controller('DownloadController', ["$scope", "$http", "$modalInstance", "info",
		function ($scope, $http, $modalInstance, info) {
		$scope.target = "files/download/" + info.id;
		$scope.cancel = function () {
			$modalInstance.close();
		};
	}])
	/* End of Document Page */

	/* Result Page */
	.controller("ResultsController", ["$scope", "$http", "$timeout",
		function($scope, $http, $timeout){
			// Pagination
	        $scope.pagination = { page: 1, total: 1, itemPerPage: 10 }
		    $scope.setPage = function(){ loadPage(); }
		    var loadPage = function() {
	  			$http.get("exams", {params:$scope.pagination}).success(function(data){ 
	  			    $scope.exams = data.data;
					$scope.pagination.total = data.total;
	  			});
		    }
		    loadPage();
		}
	])
	.controller("ResultController", ["$scope", "$http", "$timeout", "$routeParams", "$filter",
		function($scope, $http, $timeout, $routeParams, $filter){
			$scope.examId = $routeParams.id;
	        $scope.sortBy = "sroll";
			$scope.isReverse = false;
			$http.get("exams/" + $scope.examId).success(function(data){
	  			$scope.exam = data;
	  		});
	  		$http.get("exams/" + $scope.examId + "/results").success(function(data){
	  			$scope.results = data;
	  		});
			$scope.sort = function(sortBy){
				if(sortBy == $scope.sortBy) $scope.isReverse = !$scope.isReverse;
				$scope.results = $filter('orderBy')($scope.results, sortBy, $scope.isReverse);
				$scope.sortBy = sortBy;
			}
		}
	])
	/* End of Result Page */

	/* About */
	.controller("AdmissionController", ["$scope", "$modal",
		function($scope, $modal){
			$scope.open = function (package, size) {
				var modalInstance = $modal.open({
					templateUrl: 'templates/AdmissionForm.html',
					controller: 'AdmisionFormController',
					size: size,
					resolve: {
						data: function () {
							return {
								package : package
							};
						}
					}
				});
			};
		}
	])
	.controller('AdmisionFormController', ["$scope", "$http", "$interval", "$timeout", "$modalInstance", "Upload", "data",
		function ($scope, $http, $interval, $timeout, $modalInstance, Upload, data) {
			$scope.student = {};

	        if(localStorage.student != undefined){
	        	$scope.student = angular.fromJson(localStorage.student);
	        	$scope.student.date_of_birth = new Date(Date.parse($scope.student.date_of_birth));
	    	}
			$interval(function(){
                localStorage.student = angular.toJson($scope.student);
			}, 10000);

			$scope.student.package = data.package;
			var file;
			$scope.upload = function($files){
				file = $files[0];
				if(file == undefined) return;
				Upload.upload({
	                url: 'files/upload',
	            	file: file
	            }).success(function(data, status, headers, config){
	            	$scope.student.image = data;
	            });
			}
			$scope.create = function(){
				$scope.student.fileName = file.name;
				$http.post('admissions/', $scope.student)
				    .success(function(){
						$scope.success = "Your addmission request has been sent!";
						$scope.student = {};
						localStorage.removeItem("student");
					}).error(function(data){ $scope.errors = data; });
			}
		}
	])
	/* End of Page */

	/* Directive */
	.directive('error', function() {
		return {
    		restrict: 'E',
        	scope: { errors: '=' },
			templateUrl: '../templates/Errors.html'
		};
	})
	/* End of Directive */

	/* Filters */		
	.filter("fixdate", function(){
		return function(input) {
			return new Date(Date.parse(input));
		};
	})
	.filter('ago', function() {
		return function(input) {
			var time = (new Date - new Date(input))/1000;
			var divider = [60, 60, 24, 30, 12];
			var string  = [" second", " minute", " hour", " day", " month", " year"];
			for(var i = 0; Math.floor(time/divider[i]) > 0; i++) {
				time /= divider[i];
			}
			var plural = (Math.floor(time)>1? "s" : "")
			return Math.floor(time) + string[i] + plural + " ago";
  		};
	})
	.filter("size", function() {
		return function(input) {
			if(input< 1024) return input;
			if(input>=1024 && input <= 1048576) return (input/1024);
			if(input>=1048576) return (input/1048576);
		};
	})
	.filter("sizeType", function() {
		return function(input) {
			if(input< 1024) return 'B';
			if(input>=1024 && input <= 1048576) return 'KB';
			if(input>=1048576) return 'MB';
		};
	})
	.filter("gp", function() {
		return function(input, markRange) {
			markRange = markRange? markRange : 100;
			input = (input * 100) / markRange;
			if(input>=0  && input<33 ) return 0.00;
			if(input>=33 && input<40 ) return 1.00;
			if(input>=40 && input<50 ) return 2.00;
			if(input>=50 && input<60 ) return 3.00;
			if(input>=60 && input<70 ) return 3.50;
			if(input>=70 && input<80 ) return 4.00;
			if(input>=80 && input<101) return 5.00;
		};
	})
	.filter("thumbnail", function() {
		return function(input) {
			if(input == '') return;
			if(!input.match(/^fileStorage/)) {
			 	return 'http://img.youtube.com/vi/' + input + '/mqdefault.jpg';
			}
			return input + 't.jpg';
		};
	})
	.filter("videolink", function() {
		return function(input) {
			return '//www.youtube.com/embed/'+ input;
		};
	})
	.filter("icon", function() {
		return function(input) {
        	switch(input){
        		case 'document'     : return "word"       ; break;
        		case 'spreadsheet'  : return "excel"      ; break;
        		case 'presentation' : return "powerpoint" ; break;
        		case 'ebook'        : return "ebook"      ; break;
        	}
		};
	})
	.filter("class", function(){
		return function(input){
			var roman = ["I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII"];
			return roman[input-1];
		}
	});
	/* End of Filter */