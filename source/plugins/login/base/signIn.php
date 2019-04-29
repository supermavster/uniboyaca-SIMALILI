<?php

/**
 * Content - Form Login/Sigin
 **/

//Login
//FORM
$form = new HTMLTag('form', array(
    "class" => "form",
    "method" => "POST",
    "id" => "acceso",
    "action" => "",
    "accept-charset" => "utf-8"
));

//Extned
$inputLogin = new HTMLTag('input', array(
    "type" => "text",
    "id" => "userAcceso",
    "name" => "userAcceso",
    "class" => "acceso form-control",
    "placeholder" => LOGIN['LOGIN-USER'],
    "autocomplete" => "on",
    "maxlength" => "20"
));
$inputPassword = new HTMLTag('input', array(
    "type" => "password",
    "name" => "passAcceso",
    "id" => "passAcceso",
    "class" => "acceso form-control",
    "placeholder" => LOGIN['LOGIN-PASSWORD'],
    "autocomplete" => "on",
    "maxlength" => "60"
));
//button
$button = new HTMLTag('button', array(
    "type" => "submit",
    "name" => "acceso",
    "class" => "btn btn-social btn-fill btn-round btn-github"
));
$button->innerHTML(LOGIN['LOGIN-NOW']);


//RB
$input = new HTMLTag('input', array(
    "type" => "checkbox",
    "id" => "remember",
    "name" => "remember",
    "checked" => ""
));

$form->appendInnerHTML('
<div class="modal-dialog modal-login" role="document">
	<div class="modal-content">
		<div class="card card-signup card-plain">
			<div class="modal-header">
			  <div class="card-header card-header-danger text-center">
				<h4 class="card-title">' . LOGIN['LOGIN-TITLE'] . '</h4>
			  </div>
			</div>
			<div class="modal-body">
					<div class="card-body">
						<div class="form-group bmd-form-group">
							<div class="input-group">
							  <div class="input-group-prepend">
								<div class="input-group-text">
									<i class="' . THEME_ICON . ' fa-envelope"></i>
								</div>
							  </div>
							  ' . $inputLogin->asHTML() . '
							  </div>
						</div>

						<div class="form-group bmd-form-group p-0">
							<div class="input-group">
							  <div class="input-group-prepend">
								<div class="input-group-text">
									<i class="' . THEME_ICON . ' fa-lock"></i>
								</div>
							  </div>
							  ' . $inputPassword->asHTML() . '
							  </div>
						</div>
					</div>
			</div>
			<div class="modal-footer justify-content-center mb-3">
			' . $button->asHTML() . '
			</div>
		</div>
	</div>
</div>
');
$body->appendInnerHTML('<div class="" id="loginModal" tabindex="-1" role="">' . $form->asHTML() . '</div>');