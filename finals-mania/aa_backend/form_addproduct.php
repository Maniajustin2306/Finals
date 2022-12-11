<!-- Add Product -->
	<div class="modal fade" id="addproductModal" tabindex="-1" role="dialog" aria-labelledby="addproductModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="addproductModalLabel"><i class="fas fa-plus"></i>&nbsp;Add Product</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form method="post" enctype="multipart/form-data" class="text-center border border-light p-5">
	        	<div class="form-group">
			        <div>
			            <input type="text" name="inputProdName" id="inputProdName" class="form-control" placeholder="Product Name" required>
			        </div>			      
				</div>
				<div class="form-group">
				    <textarea name="inputDescrip" id="inputDescrip" class="form-control" id="exampleFormControlTextarea1" placeholder="Product Description" rows="4"></textarea>
				</div>
				<div class="form-group">
			        <div>
			            <input type="num" name="inputProdPrice" id="inputProdPrice" class="form-control" placeholder="Product Price" required>
			        </div>			      
				</div>
				<div class="form-inline">
					<label for="inputPhoto1">Photo 1</label>
				    <input name="inputPhoto1" id="inputPhoto1" type="file" class="form-control-file" required>
				</div>
				<div class="form-inline mt-2">
					<label for="inputPhoto2">Photo 2</label>
				    <input name="inputPhoto2" id="inputPhoto2" type="file" class="form-control-file" required>
				</div>		    	
	      </div>
	      <div class="modal-footer">
	      	<button type="submit" name="btnAddProd" id="btnAddProd" class="btn btn-primary">Add</button>
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>  
	      </div>
	      </form>
	    </div>
	  </div>
	</div>