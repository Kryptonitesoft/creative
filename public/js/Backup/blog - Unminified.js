angular
	.module("CreativeBlog", ['ngRoute', "ngResource", 'ngAnimate', "ui.bootstrap", "textAngular", 'angular-loading-bar'])
	
	.config(['$routeProvider', '$sceDelegateProvider', '$sceProvider',
		function($routeProvider) {
			$routeProvider
				.when("/"            , { templateUrl: "templates/blog/BlogList.html"    , controller: "BlogPostsController"     })
				.when("/:id"         , { templateUrl: "templates/blog/BlogView.html"    , controller: "SingleBlogPostController"})
				.when("/category/:id", { templateUrl: "templates/blog/BlogList.html"    , controller: "BlogCategoriesController"})
				.when("/archive/:id" , { templateUrl: "templates/blog/BlogList.html"    , controller: "BlogArchivesController"  });
		}
	])

	/* Resources: */
	.factory("BlogPost", ["$resource", function($resource) {
  		return $resource("posts/:id", {id:'@id'});
	}])
	.factory("BlogComment", ["$resource", function($resource) {
  		return $resource("posts/:postId/comments/:commentId", {postId:'@id', id:'@commentId'});
	}])
	.factory("BlogCategory", ["$resource", function($resource) {
  		return $resource("categories/:id", {id:'@id'});
	}])
	.factory("BlogArchive", ["$resource", function($resource) {
  		return $resource("archives/:id", {id:'@id'});
	}])
	/* End of Resources */

	.controller("MainBlogController", ["$scope", "$http", "BlogCategory", "BlogArchive",
		function($scope, $http, BlogCategory, BlogArchive){
			$scope.category_id = "";
			$scope.archive_id  = "";
			$scope.categories = BlogCategory.query();
			$scope.archives   = BlogArchive.query(function(){
				for(var i=0; i<$scope.archives.length; i++) {
					$scope.archives[i].months = angular.fromJson($scope.archives[i].months);
				}
			});
		}
	])
	.controller("BlogPostsController", ["$scope", "$http",
		function($scope, $http){
			// Pagination
	        $scope.pagination = { page: 1, itemPerPage: 10 }
		    $scope.setPage = function(){ loadPage(); }
		    var loadPage = function(){
		    	$http.get("posts", {params:$scope.pagination}).success(function(data){
					$scope.posts = data.data;
					$scope.pagination.total = data.total;
				});
		    }
			loadPage();
		}
	])
	.controller("BlogCategoriesController", ["$scope", "$http", "$routeParams",
		function($scope, $http, $routeParams){
			$scope.category_id = $routeParams.id;
			$scope.$parent.category_id = $scope.category_id;
			$scope.$parent.archive_id  = "";
			// Pagination
	        $scope.pagination = { page: 1, itemPerPage: 10 }
		    $scope.setPage = function(){ loadPage(); }
		    var loadPage = function(){
		    	$http.get("categories/" + $scope.category_id, {params:$scope.pagination}).success(function(data){
					$scope.posts = data.data;
					$scope.pagination.total = data.total;
				});
		    }
			loadPage();
		}
	])
	.controller("BlogArchivesController", ["$scope", "$http", "$routeParams",
		function($scope, $http, $routeParams){
			$scope.archive_id = $routeParams.id;
			$scope.$parent.archive_id  = $scope.archive_id;
			$scope.$parent.category_id = "";
			// Pagination
	        $scope.pagination = { page: 1, itemPerPage: 10 }
		    $scope.setPage = function(){ loadPage(); }
		    var loadPage = function(){
		    	$http.get("archives/" + $scope.archive_id, {params:$scope.pagination}).success(function(data){
					$scope.posts = data.data;
					$scope.pagination.total = data.total;
				});
		    }
			loadPage();
		}
	])
	.controller("SingleBlogPostController", ["$scope", "$routeParams", "BlogPost",
		function($scope, $routeParams, BlogPost){
			$('html, body').animate({
			    scrollTop: $("#blogTitle").offset().top - 100
			}, 800);
			$scope.postId = $routeParams.id;
			$scope.post = BlogPost.get({id:$scope.postId});
        }
	])
	.controller("CommentsController", ["$scope", "$http", "$location", "BlogComment",
		function($scope, $http, $location, BlogComment){
			// Pagination
	        $scope.pagination = { page: 1, itemPerPage: 10 }
		    $scope.setPage = function(){loadPage(); }
		    var loadPage = function(){
				$http.get("posts/" + $scope.postId + "/comments/", {params:$scope.pagination}).success(function(data){
					$scope.comments = data.data;
					$scope.pagination.total = data.total;
				});
		    }
		    loadPage();
			$scope.comment = {};
			$scope.create = function(){
				BlogComment.save({postId:$scope.postId}, $scope.comment,
					function(){
						$scope.post.comment_count++;
						$scope.comment.created_at = new Date();
						$scope.comments.unshift($scope.comment);
						$scope.comment = {};
						$scope.errors = "";
				 }, function(err){
						$scope.errors = err.data;
				});
			}
			$scope.reply = function(name) {
				$scope.comment.body = "@" + name + " ";
				$('html, body').animate({
				    scrollTop: $("#focus").offset().top - 150
				}, 800);
				$("#focus").focus();
			}
		}
	])

	/* Filters */		
	.filter("fixdate", function(){
		return function(input) {
			return new Date(Date.parse(input));
		};
	})
	.filter("removews", function(){
		return function(input) {
			return input.replace(/ /g,'');
		};
	});
	/* End of Filter */