<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<?php
	echo $this->Html->meta('icon');

	echo $this->Html->css('bootstrap.min');
	echo $this->Html->css('mystyle');
	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
	?>
</head>
<body>
	<nav class="navbar  navbar-default navbar-fixed-top navbar-inverse" role="navigation">
		<div class="container-fluid ">
			<div class="navbar-header">

				<a class="navbar-brand">Blog</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav" >
					<?php if(AuthComponent::user('id')):?>
						<li><?php
							echo $this->Html->link('Add Post Here!',
								array('controller'=>'posts', 'action'=>'add')
								);
								?> </li>
								<li><?php
									echo $this->Html->link('View Users List',
										array('controller'=>'users', 'action'=>'index')
										);
										?> </li>
										<li><?php
											echo $this->Html->link('View Post',
												array('controller'=>'posts', 'action'=>'index')
												);
												?></li>
												<li><?php
													echo $this->Html->link('Posts Manage',
														array('controller'=>'posts', 'action'=>'post')
														);
														?></li>

														<li><?php
															echo $this->Html->link('Logout',
																array('controller'=>'users', 'action'=>'logout')
																);
																?></li>
															<?php endif;?>
															<?php if(!AuthComponent::user('id')):?>

															</ul>
															<ul class="nav navbar-nav">
																<li><?php
																	echo $this->Html->link('View Post',
																		array('controller'=>'posts', 'action'=>'index')
																		);
																		?></li>
																		<li><?php
																			echo $this->Html->link('Register Here!',
																				array('controller'=>'users', 'action'=>'add')
																				);
																				?></li>
																				<li><?php
																					echo $this->Html->link('login',
																						array('controller'=>'users', 'action'=>'login')
																						);
																						?></li>
																					</ul>
																				<?php endif;?>
																			</div>
																		</div>
																	</nav>

																	<div class="jumbotron">
																		<div class="container text-center">
																			<h1>Frobom Myanmar</h1>
																			<p>Some text that represents "Me"...</p>
																		</div>
																	</div>

																	<div class="main_content">

																		<?php echo $this->Flash->render(); ?>

																		<?php echo $this->fetch('content'); ?>
																	</div>

																</div><br><br>

																<footer class="container-fluid text-center">
																	<p>Footer Text</p>
																</footer>

															</body>
															</html>
