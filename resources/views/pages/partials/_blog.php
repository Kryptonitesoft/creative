<main class="blog" ng-app="CreativeBlog" ng-controller="MainBlogController">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div ng-view></div>
			</div>
			<div class="col-lg-offset-1 col-lg-3 col-md-4">
				<aside class="blogSidebar">
					<a ng-href="#/"><h3 ng-show="categories.length">Catagories</h3></a>
					<ul>
						<a ng-href="#category/{{category.id}}" class="repeat-animation" ng-repeat="category in categories"><li ng-class="{activated: (category.id==category_id)}">{{category.name}}</li></a>
					</ul>
					<a ng-href="#/"><h3 ng-show="archives.length">Archives</h3></a>
					<ul>
						<li ng-repeat="years in archives">{{years.year}}
							<ul>
								<a ng-href="#archive/{{months.id}}" class="repeat-animation" ng-repeat="months in years.months | orderBy:month" ng-class="{activated: months.id==archive_id}"><li>{{months.month | date:'MMMM'}}</li></a>
							</ul>
						</li>
					</ul>
				</aside>
			</div>
		</div>
	</div>
</main>	