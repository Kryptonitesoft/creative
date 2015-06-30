<main class="documents" ng-app="Creative" ng-controller="DocumentsController">
	<div class="container" >
		<div class="row">
			<div class="col-sm-6">
				<h2 class="pageTitle">Document</h2>
			</div>
			<div class="col-sm-6 btn-radio" ng-show="pagination.total>1">
			    <div class="btn-group">
			        <label class="btn" ng-model="pagination.type" btn-radio="'file'" ng-click="showByType('file')">All</label>
			        <label class="btn" ng-model="pagination.type" btn-radio="'document'" ng-click="showByType('document')">Word</label>
			        <label class="btn" ng-model="pagination.type" btn-radio="'presentation'" ng-click="showByType('presentation')">PowerPoint</label>
			        <label class="btn" ng-model="pagination.type" btn-radio="'ebook'" ng-click="showByType('ebook')">eBooks</label>
			    </div>
			</div>
		</div>

		<p ng-hide="pagination.total" class="notFound">Sorry! No uploads yet.</p>
		
		<div class="row container-fluid">
			<?php if(count($errors) > 0) { ?>
				<div class="alert alert-danger">
					<strong>Whoops!</strong> The password you've entered doesn't match.
				</div>
			<?php } $errors = []; ?>
			<div class="col-lg-2 col-sm-3 col-xs-6 repeat-animation" ng-repeat="file in files">
				<a href="#" tooltip-template="'FileInfo.html'" tooltip-popup-delay='800'>
					<div class="tile" ng-click="open($index, 'sm')">
						<span class="icon icon-{{file.type | icon}}"></span>
						<span class="title">{{file.title | limitTo:20 }}</span>
						<span class="icon icon-download"></span>
					</div>
				</a>
			</div>
		</div>
		<div class="container-fluid text-center">
			<pagination boundary-links="true" total-items="pagination.total" ng-model="pagination.page" class="pagination-sm" previous-text="&lsaquo;" next-text="&rsaquo;" first-text="&laquo;" last-text="&raquo;" items-per-page="pagination.itemPerPage" rotate="true" ng-click="setPage(pagination.page)" ng-show="pagination.total>pagination.itemPerPage" max-size="5"></pagination>
		</div>
	</div>
	<script type="text/ng-template" id="myModalContent.html">
	    <div class="documentsModal">
	    	<div class="modal-header">
	        	<span class="">You need to provide password to download this file!</span>
	        </div>
	        <form class="form" action="{{target}}" method="POST">
	        <div class="modal-body">
         		<div class="form-group">
         			<input type="hidden" name="_token" value="<?= csrf_token() ?>">
         			<input type="password" name="pass" class="form-control" placeholder="Password Please!" ng-model="password" ng-required="true">
         		</div>
	        </div>
		    <div class="modal-footer">
	    		<input type="submit" class="btn" value="Download">
	    		<div class="btn" ng-click="cancel()"> Cancel</div>
		    </div>
	        </form>
	    </div>
    </script>

	<script type="text/ng-template" id="FileInfo.html">
		<div style="text-align:left">
			<div>{{file.title}}</div>
			<div>{{file.size | size | number:2 }} {{file.size | sizeType }}</div>
			<div>Downloads: {{file.views}}</div>
			<div>Uploaded: {{file.created_at | ago}}</div>
		</div>
    </script>
</main>