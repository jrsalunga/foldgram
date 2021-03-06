
<div id="popup" class="modal hide fade in" tabindex="1" role="dialog" aria-labelledby="myModalLabel" ariahidden=" false" style="display: none;">
	<div class="modal-body">
		<div class="cfrom-wapper">
			<img src="{{ URL::asset('/img/create-form-flow.png') }}" />
			<button class="close " aria-hidden="true" data-dismiss="modal" type="button">×</button>
			{{ Form::open( array('url' => URL::route('create'), 'files' => true )) }}
			<div class="setp1">
				<div class="message create-form">
					<textarea rows="4" class="enter-message  required" placeholder="Enter Your Message: " name="message" cols="50"></textarea>
					<br>You have <span id="charsLeft">1200</span> chars left.
					<div class="clear"></div>
					<div id="thumbnail"><img src="{{ URL::asset('/img/placeholder.gif') }}" /></div>	
					
					
					{{ Form::file('image', array('id'=>'upload-image', 'class'=>'required', 'style'=>'opacity: 0; height: 0px; width: 10px;')) }}
					<div id="upload" class="drop-area">
						<span class="uploadfile">Upload File</span>
						<p class="help-block">Files must be less than <span>8 MB</span></p>
		                <p class="help-block">Allowed file types: <span>png gif jpg jpeg</span></p>
					</div>
				</div>
			</div>
			<div class="address">
				<div class="photocreate-form recipient_address_wapper">
					<div class="recipient_address" id="recip_1">
						<h3>Recipients Address <span class="acount" style="display: none;">1</span> </h3>
						<input placeholder="Full Name:" class="required " type="text" name="address[0][fullname]" value="">
						<textarea placeholder="Enter Recipients Address here:" rows="8" class="required" name="address[0][address_one]" cols="50"></textarea>
					</div>
				</div>
			</div>
			<div class="submit">
				<div class="submit-content">
					<button class="add btn-large btn" type="button">Add Another Address</button>
					<button class="remove btn-large btn" type="button" style="display:none;">Remove Address</button><br>
					<button class="submit-btn btn-large btn" type="submit">Save</button>
				</div>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>

<div id="recipient_address" style="display:none">
	<div id="recip_aid" class="recipient_address">
		<h3>
			Recipient's Address<span class="acount" style="display: none;"># rone</span>
		</h3>
	<input class="required " type="text" value="" name="address[zero][fullname]" placeholder="Full Name:">
	<textarea class="required " cols="50" name="address[zero][address_one]" rows="8" placeholder="Enter Recipient's Address here:"></textarea>
	</div>
</div>