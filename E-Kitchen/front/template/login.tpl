{{define "content"}}
aaaaaaaaaaaaaaaaaa
<section class="uk-background-default uk-padding uk-panel">
	<form action="/login" method="post">
		<div class="uk-margin">
			<label for="mail">Email</label><br>
			<div class="uk-inline">
				<span class="uk-form-icon" uk-icon="icon: user"></span>
				<input class="uk-input uk-width-1-2" type="text" name="email">
			</div>
		</div>
		<div class="uk-margin">
			<label for="password">Password</label><br>
			<div class="uk-inline">
				<span class="uk-form-icon" uk-icon="icon: lock"></span>
				<input class="uk-input uk-width-1-2" type="text" name="password">
			</div>
		</div>
		<div class="button-aria mg-t-20">
			<input type="submit" class="uk-button uk-button-primary" value="Login"><br>
			<a href="/signup">Sign up now</a>
		</div>
	</form>
</section>
{{end}}

