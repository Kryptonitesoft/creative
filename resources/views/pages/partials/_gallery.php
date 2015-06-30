<main class="gallery"  ng-app="Creative" ng-controller="GalleryController">
	<div class="container">
		<div class="row">
			<div class="col-xs-6">
				<h2 class="pageTitle">Gallery</h2>
			</div>
			<div class="col-xs-6 btn-radio" ng-show="pagination.total > 1">
			    <div class="btn-group">
			        <label class="btn" ng-model="pagination.type" btn-radio="'media'" ng-click="showByType('media')">All</label>
			        <label class="btn" ng-model="pagination.type" btn-radio="'image'" ng-click="showByType('image')">Images</label>
			        <label class="btn" ng-model="pagination.type" btn-radio="'video'" ng-click="showByType('video')">Videos</label>
			    </div>
			</div>
		</div>

		<p ng-hide="pagination.total" class="notFound">Sorry! No uploads yet.</p>

		<div class="row tiles">
			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 repeat-animation" ng-repeat="fileEntry in fileEntries | orderBy:created_at:reverse">
				<a href="#" tooltip-template="'FileInfo.html'" tooltip-popup-delay='1000'>
					<figure ng-click="open($index)">
						<div class="preview">
	         				<span ng-hide="fileEntry.isVisible" class="icon-lock-circle"></span>
							<img ng-src="{{fileEntry.link | thumbnail }}" alt="{{fileEntry.title}}">
		        			<div ng-show="fileEntry.type=='video'"><span class="icon-play-circle"></span></div>
						</div>
						<figcaption class="title">{{fileEntry.title}}</figcaption>
						<figcaption class="uploaded">{{fileEntry.created_at | ago}}</figcaption>
					</figure>
				</a>
			</div>
		</div>

		<div class="container-fluid text-center">
			<pagination boundary-links="true" total-items="pagination.total" ng-model="pagination.page" class="pagination-sm" previous-text="&lsaquo;" next-text="&rsaquo;" first-text="&laquo;" last-text="&raquo;" items-per-page="pagination.itemPerPage" rotate="true" ng-click="setPage(pagination.page)" ng-show="pagination.total>pagination.itemPerPage" max-size="5"></pagination>
		</div>

	</div>

	<script type="text/ng-template" id="FileInfo.html">
		<div style="text-align:left">
			<div>{{fileEntry.title}}</div>
			<div>Views: {{fileEntry.views}}</div>
			<div>Uploaded: {{fileEntry.created_at | ago}}</div>
		</div>
	</script>
</main>