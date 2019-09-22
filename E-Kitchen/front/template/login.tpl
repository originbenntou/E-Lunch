{{define "content"}}
<section class="uk-margin-large-top uk-width-2-5@l uk-width-4-5 uk-margin-auto uk-margin uk-card uk-card-default uk-card-body uk-text-center">
	<form action="/home" method="get">
		<div class="uk-margin">
			<label for="mail">Email</label><br>
			<div class="uk-width-4-5 uk-inline">
				<span class="uk-form-icon" uk-icon="icon: user"></span>
				<input class="uk-input" type="text" name="email">
			</div>
		</div>
		<div class="uk-margin">
			<label for="password">Password</label><br>
			<div class="uk-width-4-5 uk-inline">
				<span class="uk-form-icon" uk-icon="icon: lock"></span>
				<input class="uk-input" type="password" name="password">
			</div>
		</div>
		<div class="button-aria mg-t-20 uk-margin-medium-top">
			<input type="submit" class="uk-button uk-button-primary" value="Login"><br>
			<a href="/signup">Sign up now</a>
		</div>
	</form>
</section>
{{end}}

