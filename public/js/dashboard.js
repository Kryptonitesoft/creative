angular
	.module("Creative",["ngRoute", 
						"ngAnimate",
						"ngResource",
						"ngFileUpload",
						"ui.bootstrap",
						"textAngular",
						"angular-loading-bar"
					])
	.config(['$sceDelegateProvider','$routeProvider',
		'$provide',
		function($sceDelegateProvider, $routeProvider, $provide){
		$sceDelegateProvider.resourceUrlWhitelist([
			'self',
			'*://www.youtube.com/**'
		]);
		$routeProvider
			.when("/"				     , { templateUrl: "templates/admin/FileEntryView.html", controller: "FileEntryController"    } )
			.when("/fileentry/:type?"    , { templateUrl: "templates/admin/FileEntryView.html", controller: "FileEntryController"    } )
			.when("/files/add"           , { templateUrl: "templates/admin/FileEntryForm.html", controller: "AddFileController"      } )
			.when("/files/edit/:id"      , { templateUrl: "templates/admin/FileEntryForm.html", controller: "EditFileController"     } )
			.when("/teachers"            , { templateUrl: "templates/admin/TeachersView.html" , controller: "TeacherController"      } )
			.when("/teachers/add"        , { templateUrl: "templates/admin/TeacherForm.html"  , controller: "AddTeacherController"   } )
			.when("/teachers/edit/:id"   , { templateUrl: "templates/admin/TeacherForm.html"  , controller: "EditTeacherController"  } )
			.when("/exams"               , { templateUrl: "templates/admin/ExamView.html"     , controller: "ExamController"         } )
			.when("/exams/add"           , { templateUrl: "templates/admin/AddExamForm.html"  , controller: "AddExamController"      } )
			.when("/exams/:id/results"   , { templateUrl: "templates/admin/ResultView.html"   , controller: "ResultController"       } )
			.when("/admissions"          , { templateUrl: "templates/admin/AdmissionView.html", controller: "AdmissionController"    } )
			.when("/admissions/:id"      , { templateUrl: "templates/admin/AdmissionForm.html", controller: "EditAdmissionController"} )
			.when("/posts"               , { templateUrl: "templates/admin/BlogPostView.html" , controller: "BlogPostController"     } )
			.when("/posts/add/"          , { templateUrl: "templates/admin/BlogPostForm.html" , controller: "AddBlogPostController"  } )
			.when("/posts/edit/:id"      , { templateUrl: "templates/admin/BlogPostForm.html" , controller: "EditBlogPostController" } )
			.when("/settings/"           , { templateUrl: "templates/admin/Settings.html"     , controller: "SettingsController"     } )
			.otherwise({ redirectTo: '/' });
		$provide.decorator('taOptions', ['$delegate', function(taOptions){
			taOptions.toolbar = [
	  			['bold', 'italics', 'underline', 'justifyLeft', 'justifyCenter', 'justifyRight'],
	  			['ul', 'ol', 'p', 'quote', 'redo', 'undo'],
	  			['h1', 'h2', 'h3', 'insertLink', 'insertImage', 'insertVideo'],
	  			['wordcount', 'charcount']
			];
			return taOptions;
		}]);
	}])


	// Resource Services
	.factory("File", ["$resource", function($resource) {
  		return $resource("api/files/:id", {id:'@id'}, {
  			query: { isArray: false },
  			update: { method : "PUT" },
  			changeVisibility: { url: "api/files/changevisibility/:id", method : "POST" }
  		});
	}])

	.factory("Exam", ["$resource", function($resource) {
  		return $resource("api/exams/:id", {id:'@id'},{
  			query: { isArray: false },
  			update: { method : "PUT" }
  		});
	}])
	
	.factory("Result", ["$resource", function($resource) {
  		return $resource("api/exams/:examId/results/:resultId", {examId:'@id', resultId:'@id'}, {
  			update: { method : "PUT" }
  		});
	}])
	
	.factory("Teacher", ["$resource", function($resource) {
  		return $resource("api/teachers/:id", {id:'@id'}, {
  			update: { method : "PUT" }
  		});
	}])
	
	.factory("Admission", ["$resource", function($resource) {
  		return $resource("api/admissions/:id", {id:'@id'}, {
  			update: { method : "PUT" }
  		});
	}])
	
	.factory("BlogPost", ["$resource", function($resource) {
  		return $resource("api/posts/:id", {id:'@id'}, {
  			query: { isArray: false },
  			update: { method : "PUT" }
  		});
	}])
	
	.factory("BlogComment", ["$resource", function($resource) {
  		return $resource("api/posts/:postId/comments/:commentId", {postId:'@id', id:'@commentId'}, {
  			query: { isArray: false },
  			update: { method : "PUT" }
  		});
	}])
	
	.factory("BlogCategory", ["$resource", function($resource) {
  		return $resource("categories/:id", {id:'@id'});
	}])
	// End of Resource Services


	// Services
	.factory("Util", [function(){
		return {
			getFileType: function(fileName) {
				var extension = /[^.]+$/.exec(fileName)[0].toLowerCase();
				switch(extension) {
					case 'jpg':
					case 'png':
					case 'gif':
						return "image";
						break;
					case 'doc' :
					case 'docx':
						return "document";
						break;
					case 'ppt' :
					case 'pptx':
					case 'pps' :
					case 'ppsx':
						return "presentation";
						break;
					case 'pdf' :
						return 'ebook';
						break;
				}
			}
		};
	}])

	.controller("MainController", ['$scope', function($scope){
		$scope.$on('$routeChangeStart', function(next, current) {
 			$scope.loadingIcon = true;
 		});
		$scope.$on('$routeChangeSuccess', function(next, current) {
 			$scope.loadingIcon = false;
 		});
	}])


	/* File Entry Module */
	.controller("FileEntryController", ['$rootScope', '$scope', '$routeParams', "$modal", 'File',
		function($rootScope, $scope, $routeParams, $modal, File){
			// Variables
			var type = $routeParams.type;
			$scope.pageTitle = type ? type : 'Overview';
			$rootScope.current = $scope.pageTitle.toLowerCase();
			// Fetching Configurations:
	        if(localStorage.config == undefined){
				$scope.config = {
					orderBy   : 'created_at',
					isReverse : true
				};
                localStorage.config = angular.toJson($scope.config);
	        } else { $scope.config = angular.fromJson(localStorage.config); };
			// Pagination
	        $scope.pagination = {
	        	page 	    : 1,
	        	itemPerPage : 8,
				type        : type ? type.substr(0, type.length-1) : '',
				orderBy     : $scope.config.orderBy,
				isReverse   : $scope.config.isReverse,
				total       : 1
	        };
	        $scope.setPage = function(pageNo){ $scope.loadPage(); };
	        // Fetching the Entries
	       	$scope.loadPage = function(){
	       		File.query($scope.pagination, function(data){
					$scope.fileEntries = data.data;
					$scope.pagination.total = data.total;
					for(var i=0; i<$scope.fileEntries.length; i++){
						if($scope.fileEntries[i].type != 'image' && $scope.fileEntries[i].type != 'video') {
							$scope.fileEntries[i].link = '';
						}
					}
	       		})
	        };
	        $scope.loadPage();
			// Selection
	        $scope.selected = [];
	        $scope.selectedCount;
			$scope.select = function(index){
				$scope.isSelected(index) ? $scope.selected.splice($scope.selected.indexOf(index), 1) : $scope.selected.push(index);
				$scope.selectedCount = $scope.selected.length;
			};
			$scope.isSelected = function(index){
				return $scope.selected.indexOf(index) > -1
			};
			// Image Viewer Opener
			$scope.open = function (index, id, size) {
				if($scope.fileEntries[index].type != 'image' && $scope.fileEntries[index].type != 'video') return;
				var modalInstance = $modal.open({
					templateUrl: '../templates/ImageViewer.html',
					controller: 'ImageViewerController',
					size: size,
					resolve: {
						info: function () {
							return {
								fileEntries : $scope.fileEntries,
								index : index,
								id : id
							};
						}
					}
				});
				setTimeout(function(){ document.getElementById("imageViewer").focus(); }, 100);
			};
		}
	])
	.controller("AddFileController", ["$scope", "$resource", '$location', '$timeout', "Upload", 'File', "Util",
		function($scope, $resource, $location, $timeout, Upload, File, Util){
			$scope.fileEntry = {};
			$scope.fileEntry.isVisible = true;
			var file;
			$scope.upload = function($files){
				$scope.errors = undefined;
				file = $files[0];
				if(file == undefined) return;
				$scope.fileEntry.thumbnail = undefined;
				detectType();
				if($scope.fileEntry.type == undefined) {
					$scope.errors = { file: ["Invalid file type! Only image, word, powerpoint & pdf files are supported."] }
					return;
				}
				if(file.size > 2097152 && $scope.fileEntry.type == "image") {
					$scope.errors = { file: ["The image file may not be greater than 2 MB."] }
					return;
				}
				Upload.upload({
	                url: 'files/upload',
	            	file: file
	            }).success(function(data){
	            	$scope.fileEntry.thumbnail = data;
	            }).error(function(err){
	            	$scope.errors = err;
	            });
			};
			$scope.save = function(){
				if($scope.fileEntry.type != 'video' && file)
					$scope.fileEntry.fileName = file.name;
				File.save($scope.fileEntry, function(){
					$location.path('/').replace();
				}, function(err){
					$scope.errors = err.data;
				});
			};
			$scope.loadThumbnail = function() {
				$scope.fileEntry.type = ($scope.fileEntry.link.length > 0) ? $scope.fileEntry.type = "video" : $scope.fileEntry.type = undefined;
				$scope.fileEntry.thumbnail  = 'http://img.youtube.com/vi/' + $scope.fileEntry.link + '/mqdefault.jpg';
	            $scope.fileEntry.created_at = new Date();
			};
			$scope.changevisibility = function(){
				$scope.fileEntry.isVisible = !$scope.fileEntry.isVisible;
			};
			var detectType = function() {
				$scope.fileEntry.type       = Util.getFileType(file.name);
	            $scope.fileEntry.created_at = new Date();
	            $scope.fileEntry.size       = file.size;
			};
		}
	])
	.controller("EditFileController", ["$scope", "$routeParams", "$location", "Upload", 'File',
		function($scope, $routeParams, $location, Upload, File){
			var fileId = $routeParams.id;
			$scope.editMode = true;
			$scope.fileEntry = File.get({id:fileId}, function(data){
				$scope.fileEntry.thumbnail  = 'http://img.youtube.com/vi/' + data.link + '/mqdefault.jpg';
			});
			$scope.changevisibility = function(){
				$scope.fileEntry.isVisible = !$scope.fileEntry.isVisible;
			};
			$scope.save = function(){
				$scope.fileEntry.$update({id:fileId}, function(){
					$location.path('/').replace();
				});
			};
		}
	])
	// File Entry Helper Controllers
	.controller('ImageViewerController', ["$scope", "$modalInstance", "info",
		function ($scope, $modalInstance, info) {
			$scope.fileEntry = info.fileEntries.filter(function(obj){
				return obj.id == info.id;
			})[0];

			$scope.next = function () {
				info.index = (info.index + 1)%info.fileEntries.length;
				$scope.fileEntry = info.fileEntries[info.index];
				if($scope.fileEntry.type != 'image' && $scope.fileEntry.type != 'video'){
					$scope.next();
				}
			};

			$scope.prev = function () {
				info.index = (info.index == 0)? info.fileEntries.length-1 : info.index - 1;
				$scope.fileEntry = info.fileEntries[info.index];
				if($scope.fileEntry.type != 'image' && $scope.fileEntry.type != 'video'){
					$scope.prev();
				}
			};

			$scope.controls = function($event) {
					 if($event.keyCode == 37) $scope.prev();
				else if($event.keyCode == 39) $scope.next();
			};
		}
	])
	.controller("ButtonBarController", ['$scope', '$filter', '$resource', '$location', 'File',
		function($scope, $filter, $resource, $location, File){
			$scope.gotoEdit = function() {
				if($scope.selected.length != 1) return;
				var index = $scope.selected[0];
				var id = $scope.fileEntries[index].id;
				$location.url("/files/edit/" + id);
			};

	        $scope.changeVisibility = function(){
	        	for(var i=0; i<$scope.selected.length; i++) {
	        		var index  = $scope.selected[i];
	        		var fileId = $scope.fileEntries[index].id;
	        		$scope.fileEntries[index].isVisible = !$scope.fileEntries[index].isVisible;
	        		File.changeVisibility({id: fileId});
	        	}
	        	$scope.$parent.selected = [];
	        	$scope.$parent.selectedCount = 0;
	        };

	        $scope.delete = function(){
	        	$scope.selected.sort(function(a, b){return a-b});
	        	for(var i=$scope.selected.length-1; i>=0; i--){
	        		var fileId = $scope.fileEntries[$scope.selected[i]].id;
	        		File.delete({id : fileId});
	        		$scope.$parent.fileEntries.splice($scope.selected[i], 1);
	        	}
	        	$scope.$parent.selected = [];
	        	$scope.$parent.selectedCount = 0;
	        };

	        $scope.setOrderBy = function(orderBy){
	        	if(orderBy == $scope.config.orderBy)
	        		$scope.config.isReverse = !$scope.config.isReverse;
	        	$scope.config.orderBy = orderBy;
	        	$scope.pagination.orderBy   = $scope.config.orderBy;
	        	$scope.pagination.isReverse = $scope.config.isReverse;
                localStorage.config = angular.toJson($scope.config);
	        	$scope.loadPage();
	        };
		}
	])
	/* End of File Entry Module */


	/* Teacher Module */
	.controller("TeacherController", ['$rootScope', '$scope', '$resource', 'Teacher', 'Teacher',
		function($rootScope, $scope, $resource, Teacher, Teacher){
			$rootScope.current = "teacher";
			$scope.teachers = Teacher.query();
			$scope.delete = function(index){
    			var teacherId = $scope.teachers[index].id;
    			Teacher.delete({id : teacherId});
    			$scope.teachers.splice(index, 1);
    		};
		}
	])
	.controller("AddTeacherController", ['$rootScope', '$scope', '$resource', '$location', 'Upload', 'Teacher',
		function($rootScope, $scope, $resource, $location, Upload, Teacher){
			$rootScope.current = "teacher";
			var file;
			$scope.teacher = {};
			$scope.upload = function($files){
				$scope.errors = undefined;
				file = $files[0];
				if(file == undefined) return;
				if(/[^.]+$/.exec(file.name)[0].toLowerCase() != 'jpg') {
					$scope.errors = { file: ["Invalid image type! Only jpg image is supported."] };
					return;
				}
				if(file.size > 2097152) {
					$scope.errors = { file: ["The image file may not be greater than 2 MB."] };
					return;
				}
				Upload.upload({
	                url: 'files/upload',
	            	file: file
	            }).success(function(data){
	            	$scope.teacher.image = data;
	            }).error(function(err){
	            	$scope.errors = err.data;
	            });
			};
			$scope.save = function(){
				if(file) $scope.teacher.fileName = file.name;
				Teacher.save($scope.teacher, function(){
					$location.path('/teachers').replace();	
				}, function(err){
					$scope.errors = err.data;
				});
			};
		}
	])
	.controller("EditTeacherController", ['$scope', '$resource', '$routeParams', '$location', 'Teacher', 'Upload',
		function($scope, $resource, $routeParams, $location, Teacher, Upload){
			var teacherId = $routeParams.id;
			$scope.teacher = Teacher.get({id: teacherId});
			$scope.upload = function($files){
				$scope.errors = undefined;
				file = $files[0];
				if(file == undefined) return;
				if(/[^.]+$/.exec(file.name)[0].toLowerCase() != 'jpg') {
					$scope.errors = { file: ["Invalid image type! Only jpg image is supported."] }
					return;
				}
				if(file.size > 2097152) {
					$scope.errors = { file: ["The image file may not be greater than 2 MB."] }
					return;
				}
				Upload.upload({
	                url: 'files/upload',
	            	file: file
	            }).success(function(data){
	            	$scope.teacher.image = data;
	            }).error(function(err){
	            	$scope.errors = err.data;
	            });
			};
			$scope.save = function(){
				if(file) $scope.teacher.fileName = file.name;
				$scope.teacher.$update({id:teacherId}, function(){
					$location.path('/teachers').replace();
				}, function(err){
					$scope.errors = err.data;
				});
			};
		}
	])
	/* End of Teacher Module */


	/* Exam Module */
	.controller("ExamController", ['$rootScope', '$scope', 'Exam',
		function($rootScope, $scope, Exam){
			$rootScope.current = "result";
			// Pagination
	        $scope.pagination = { page: 1, itemPerPage: 10, total: 1 };
		    $scope.setPage = function(){ loadPage(); };
			var loadPage = function(){
				$scope.exams = Exam.query($scope.pagination, function(data){
					$scope.exams = data.data;
					$scope.pagination.total = data.total;
				});
			};
			loadPage();
	        $scope.delete = function(index){
	        	Exam.delete({'id':$scope.exams[index].id});
	        	$scope.exams.splice(index, 1);
	        };
		}
	])
	.controller("AddExamController", ['$rootScope', '$scope', '$location', 'Exam', 'BlogCategory', 'Util',
		function($rootScope, $scope, $location, Exam, BlogCategory, Util){
			$rootScope.current = "result";
			$scope.subjects = BlogCategory.query();
			$scope.open = function($event) {
			    $event.preventDefault();
			    $event.stopPropagation();
			    $scope.opened = true;
	  		};
	  		$scope.save = function(){
	  			var exam = Exam.save($scope.exam, function(){
	  				$location.path('/exams/' + exam.id + '/results').replace();
	  			}, function(err){
	  				$scope.errors = err.data;
	  			});
	  		};
		}
	])
	/* End of Exam Module */


	/* Result Module */
	.controller("ResultController", ['$rootScope', '$scope', '$timeout', '$routeParams', '$location', '$filter', 'Exam', 'Result', 'Util',
		function($rootScope, $scope, $timeout, $routeParams, $location, $filter, Exam, Result, Util){
			$('.showForPrint').hide();
			$rootScope.current = "result";
			$scope.examId = $routeParams.id;
			$scope.exam = Exam.get({'id': $scope.examId}, function(data){
				$scope.exam.date = new Date(Date.parse(data.date));
			});
			$scope.results = Result.query({'examId':$scope.examId});
			$scope.rollMatch = false;
	        $scope.editMode = -1;
	        $scope.sortBy = "sroll";
			$scope.isReverse = false;
			
			/* Create Result */
	        $scope.create = function(){
	        	$scope.errors = undefined;
	        	var test = $scope.results.filter(function(obj){
	        		return obj.sroll == $scope.student.sroll;
	        	})
	        	if(test.length>0) {
	        		$scope.errors = { sroll : ['A student with the same roll is already inserted.'] };
	        	} else if($scope.student.mark > $scope.exam.mark_range) {
	        		$scope.errors = { mark : ["A student's mark can not be greater than mark range."] };
	        	} else {
	        		$scope.student = Result.save({'examId':$scope.examId}, $scope.student, function(){
	        			$scope.results.push($scope.student);
	        			$scope.student = {};
	        		}, function(err){
	        			$scope.errors = err.data;
	        		});
	        	}
	        };
	        /* Update Result */
	        $scope.updateResult = function(index){
	        	$scope.editMode = -1;
	        	var resultId = $scope.results[index].id;
	        	$scope.results[index].$update({'examId':$scope.examId, 'resultId':resultId});
	        };
	        /* Delete Result */
	        $scope.delete = function(index){
	        	Result.delete({'examId':$scope.examId, 'resultId':$scope.results[index].id});
	        	$scope.results.splice(index, 1);
	        };
	        /* Update Exam */
	        $scope.updateExam = function(){
	        	$scope.exam.$update({'id':$scope.examId});
	        	$location.path('/exams');
	        };
	        /* Helper Functions */
	        $scope.enableEdit = function(index){
	        	var resultId = $scope.results[index].id;
	        	$scope.results[index] = Result.get({'examId':$scope.examId, 'resultId':resultId});
	        	$scope.editMode = index;
	        };
			$scope.print = function(){
				$('.hideForPrint').hide();
				$('.showForPrint').show();
				window.print();
				$('.hideForPrint').show();
				$('.showForPrint').hide();
			};
			$scope.sort = function(sortBy){
				if(sortBy == $scope.sortBy) $scope.isReverse = !$scope.isReverse;
				$scope.results = $filter('orderBy')($scope.results, sortBy, $scope.isReverse);
				$scope.sortBy = sortBy;
			};
		}
	])
	/* End of Result Module */

	
	/* Admission Module */
	.controller("AdmissionController", ['$rootScope', '$scope', 'Admission',
		function($rootScope, $scope, Admission){
			$rootScope.current = "admissions";
			$scope.admissions = Admission.query();
			$scope.destroy = function(index){
				Admission.delete({'id':$scope.admissions[index].id});
				$scope.admissions.splice(index, 1);
			};
		}
	])
	.controller("EditAdmissionController", ['$rootScope', '$scope', '$routeParams', '$location', 'Admission', 'Upload',
		function($rootScope, $scope, $routeParams, $location, Admission, Upload){
			$('.showForPrint').hide();
			$rootScope.current = "admissions";
			$scope.student = Admission.get({'id':$routeParams.id}, function(){
				$scope.student.date_of_birth = new Date(Date.parse($scope.student.date_of_birth));
			});
			var file;
			$scope.upload = function($files){
				$scope.errors = undefined;
				file = $files[0];
				if(file == undefined) return;
				if(/[^.]+$/.exec(file.name)[0].toLowerCase() != 'jpg') {
					$scope.errors = { file: ["Invalid image type! Only jpg image is supported."] };
					return;
				}
				if(file.size > 2097152) {
					$scope.errors = { file: ["The image file may not be greater than 2 MB."] };
					return;
				}
				Upload.upload({
	                url: 'files/upload',
	            	file: file
	            }).success(function(data){
	            	$scope.student.image = data;
	            }).error(function(err){
	            	$scope.errors = err.data;
	            });
			};
			$scope.update = function(){
				if(file) $scope.student.fileName = file.name;
				$scope.student.$update({'id':$routeParams.id}, function(){
	  				$location.path('/admissions').replace();
				}, function(err){
					$scope.errors = err.data;
				});
			};
			$scope.print = function(){
				$('.hideForPrint').hide();
				$('.showForPrint').show();
				window.print();
				$('.hideForPrint').show();
				$('.showForPrint').hide();
			};
		}
	])
	/* End of Admission Module */
	

	/* Blog Post Module */
	.controller("BlogPostController", ['$rootScope', '$scope', 'BlogPost',
		function($rootScope, $scope, BlogPost, Teacher){
			$rootScope.current = "blog";
			// Pagination
	        $scope.pagination = { page: 1, itemPerPage: 10, total:1 };
		    $scope.setPage = function(){ loadPage(); };
			var loadPage = function(){
				$scope.posts = BlogPost.query($scope.pagination, function(data){
					$scope.posts = data.data;
					$scope.pagination.total = data.total;
				});
			};
			loadPage();
			$scope.destroy = function(index){
				BlogPost.delete({id:$scope.posts[index].id});
				$scope.posts.splice(index, 1);
			};
		}
	])
	.controller("AddBlogPostController", ['$rootScope', '$scope', '$location', 'BlogPost', 'BlogCategory', 'Teacher',
		function($rootScope, $scope, $location, BlogPost, BlogCategory, Teacher){
			$rootScope.current = "blog";
			$scope.addMode = true;
			$scope.post = {};
			$scope.authors = Teacher.query();
			$scope.categories = BlogCategory.query({'admin':1});
			$scope.save = function(){
				$scope.errors = undefined;
				BlogPost.save($scope.post, function(){
					$location.path("/posts").replace();
				}, function(err){
					$scope.errors = err.data;
				});
			};
		}
	])
	.controller("EditBlogPostController", ['$rootScope', '$scope', '$routeParams', '$location', 'BlogPost', 'BlogComment', 'BlogCategory', 'Teacher',
		function($rootScope, $scope, $routeParams, $location, BlogPost, BlogComment, BlogCategory, Teacher){
			var postId = $routeParams.id;
			$rootScope.current = "blog";
			$scope.post = BlogPost.get({id:postId});
			$scope.authors = Teacher.query();
			$scope.isCollapsed = true;
			$scope.categories = BlogCategory.query();
			$scope.save = function(){
				$scope.post.$update({id:postId});
	  			$location.path('/posts').replace();
			};
			$scope.comments = {};
			// Pagination
	        $scope.pagination = { page: 1, itemPerPage: 5, total:1 };
		    $scope.setPage = function(){ $scope.showComments(); };
			$scope.showComments = function(){
				$scope.comments = BlogComment.query({
					postId      : postId,
					page        : $scope.pagination.page,
					itemPerPage : $scope.pagination.itemPerPage
				}, function(data){
					$scope.comments         = data.data;
					$scope.pagination.total = data.total;
					$scope.isCollapsed = false;
				});
				$('.panel-body').slideDown();
			};
			$scope.deleteComment = function(index) {
				BlogComment.delete({'postId':postId, 'commentId':$scope.comments[index].id});
				$scope.comments.splice(index, 1);
			};
		}
	])
	/* End of Blog Post Module */


	/* Settings Module */
	.controller("SettingsController", ["$rootScope", "$scope", "$http",
		function($rootScope, $scope, $http){
			$rootScope.current = "settings";
			$scope.newPass = "";
			$http.get("api/admin/getinfo")
				.success(function(data){
					$scope.info = data;
				}
			);
			$scope.update = function(){
				$scope.errors = undefined;
				$http.post("api/admin/update", $scope.admin).success(function(data){
					if(data == 'false') {
						$scope.errors = { old_password: ["The old password doesn't match our record!"]}
					} else {
						$scope.success = "Password changed successfully!";
					}
				}).error(function(err){
					$scope.errors = err;
				});
			};
			$scope.changeFilePassword = function(){
				$http.get("api/admin/changefilepassword/" + $scope.newPass)
					 .success(function(data){ $scope.info.filepass = data; });
			};
			$scope.clearTemp = function(){
				$http.get("api/admin/cleartemp")
					 .success(function(data){ $scope.info.tempsize = data; });
			};
		}
	])
	/* End of Admin Module */

	/* Directive */
	.directive('error', function() {
		return {
    		restrict: 'E',
        	scope: { errors: '=' },
			templateUrl: 'Errors.html'
		};
	})
	/* End of Directive */

	// Filters
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
	.filter("fixdate", function(){
		return function(input) {
			return new Date(Date.parse(input));
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
	.filter("size", function() {
		return function(input) {
			if(input< 1024) return input;
			if(input>=1024 && input <= 1048576) return (input/1024);
			if(input>=1048576) return (input/1048576);
		};
	})
	.filter("sizeType", function() {
		return function(input) {
			var type;
			if(input <        1024) 					  type =  "B";
			if(input >=       1024 && input < 1048576   ) type = "KB";
			if(input >=    1048576 && input < 1073741824) type = "MB";
			if(input >= 1073741824) 				      type = "GB";
			return type;
		};
	})
	.filter("thumbnail", function() {
		return function(input) {
			if(input == '' || input == undefined) return;
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
	.filter("phone", function() {
		return function(input) {
			return '+880 '+ input;
		};
	})
	.filter("class", function(){
		return function(input){
			var roman = ["I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII"];
			return roman[input-1];
		};
	})
	.filter('nl2br', function($sce){
    	return function(input, is_xhtml) {
	        var is_xhtml = is_xhtml || true;
	        var breakTag = (is_xhtml) ? '<br />' : '<br>';
	        var input = (input + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1'+ breakTag +'$2');
	        return $sce.trustAsHtml(input);
    	};
	});
	// End of Filters

// jQuery
$(document).ready(function(){
	$(".navbar-toggle").on("click", function(){
		$(".sidebar aside").animate({width:'toggle'},250);
	});
	if(window.innerHeight <500) $(".storage").hide();
});