{{define "content"}}
<section class="uk-margin-large-top uk-width-2-5@l uk-width-4-5 uk-margin-auto uk-margin uk-card uk-card-default uk-card-body uk-text-center">
	<form action="/user-register" method="post">
		<fieldset class="uk-fieldset">

			<legend class="uk-legend">ユーザー登録</legend>

			<div class="uk-margin">
				<label class="uk-form-label uk-text-left" for="form-stacked-text">E-mail</label>
				<input class="uk-input" type="text" name="email">
			</div>

			<div class="uk-margin">
				<label class="uk-form-label uk-text-left" for="form-stacked-text">Password</label>
				<input class="uk-input" type="password" name="password">
			</div>

			<div class="button-aria mg-t-20 uk-margin-medium-top">
				<input type="submit" class="uk-button uk-button-primary" value="signup"><br>
			</div>
		</fieldset>
	</form>
</section>
{{end}}

