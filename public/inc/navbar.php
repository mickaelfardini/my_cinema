		<body>
			<div class="container full">
				<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
					<a class="navbar-brand" href="index.html"><img src="./img/planet-512.png" width="30" height="30" class="d-inline-block align-top" alt="">My Cinema</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item">
								<a class="nav-link" href="index.html">Home<span class="sr-only"></span></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="films.html">A l'affiche</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="subs.html">Abonnements</a>
							</li>
							<?php if(isConnected()) {
								echo '
							<li class="nav-item">
								<a class="nav-link" href="myfilms.html">Mes Films</a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'. $_COOKIE['username'] .'</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">';
									if(isAdmin($_COOKIE['username'])) {
									echo '				
									<a class="dropdown-item" href="admin.html">Admin</a>';}
									echo '
									<a class="dropdown-item" href="#">Another action</a>
									<div class="dropdown-divider"></div>
								</div>
							</li>';} ?>

						</ul>
					</div>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown nav-item">
							<?php if(isConnected()) {
								echo '
								<a href="connect.html" class="btn btn-secondary">
										Deconnexion
									</a>';
							}
							else {
								echo '
								<a href="register.html" class="mr-3"><small>Register Here</small></a>
								<a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown">Connexion<span class="caret"></span></a>';
							} ?>
							
							<ul id="login-dp" class="dropdown-menu">
								<li>
									<div class="row">
										<div class="col-md-12 text-center">
											<form action="connect.html" method="POST" class="form-signin">
												<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
												<input type="text" class="form-control" name="username" placeholder="Username">
												<input type="password" class="form-control" name="password" placeholder="Password">
													<div class="checkbox mb-2">
														<label>
															<input value="remember-me" type="checkbox" name="remember"> Remember me
														</label>
													</div>
													<input type="submit" class="btn btn-primary align-content-md-center" value="Connexion" />
											</form>
										</div>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>