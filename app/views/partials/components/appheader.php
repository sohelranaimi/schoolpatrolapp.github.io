<?php 
	
	$navbarsideleft=array(
		array(
			'path' => 'home', 
			'label' => 'Home', 
			'icon' => '<i class="fa fa-align-justify "></i>'
		),
		
		array(
			'path' => 'student', 
			'label' => 'Student', 
			'icon' => '<i class="fa fa-graduation-cap fa-2x"></i>'
		),
		
		array(
			'path' => 'new_student', 
			'label' => 'New Student', 
			'icon' => '<i class="fa fa-hand-grab-o fa-2x"></i>'
		),
		
		array(
			'path' => 'teacher', 
			'label' => 'Teacher', 
			'icon' => '<i class="fa fa-user-secret fa-2x"></i>'
		),
		
		array(
			'path' => 'class', 
			'label' => 'Class', 
			'icon' => '<i class="fa fa-hand-o-right fa-2x"></i>'
		),
		
		array(
			'path' => 'class_attendance', 
			'label' => 'Class Attendance', 
			'icon' => '<i class="fa fa-bookmark fa-2x"></i>'
		),
		
		array(
			'path' => 'hostel', 
			'label' => 'Hostel', 
			'icon' => '<i class="fa fa-hotel fa-2x"></i>'
		),
		
		array(
			'path' => 'payment', 
			'label' => 'Payment', 
			'icon' => '<i class="fa fa-dollar fa-2x"></i>'
		),
		
		array(
			'path' => 'examination', 
			'label' => 'Examination', 
			'icon' => '<i class="fa fa-book fa-2x"></i>'
		),
		
		array(
			'path' => 'result', 
			'label' => 'Result', 
			'icon' => '<i class="fa fa-angellist fa-2x"></i>'
		),
		
		array(
			'path' => 'acounting', 
			'label' => 'Acounting', 
			'icon' => '<i class="fa fa-tachometer fa-2x"></i>'
		),
		
		array(
			'path' => 'galary', 
			'label' => 'Galary', 
			'icon' => '<i class="fa fa-file-video-o fa-2x"></i>'
		),
		
		array(
			'path' => 'user', 
			'label' => 'User', 
			'icon' => '<i class="fa fa-users fa-2x"></i>'
		)
	);

		
	
?>
<template id="AppHeader">
	<div>
<b-navbar ref="navbar" toggleable="md" fixed="top" type="dark" variant="dark">
	<b-navbar-brand href="<?php print_link(""); ?>">
		<img class="img-responsive" src="<?php print_link(SITE_LOGO); ?>" /> 
		<?php echo SITE_NAME ?>
	</b-navbar-brand>
	<b-navbar-toggle target="nav_collapse"></b-navbar-toggle>
	<?php
			if(user_login_status() == true ){
		?>
	<b-collapse is-nav id="nav_collapse">
		<b-navbar-nav ref="sidebar" class="navbar-fixed-left navbar-dark bg-dark">
			
			<div class="menu-profile">
				<a class="avatar" href="#account">
					<niceimg single width="90" height="90" imgclass="user-photo" path="<?php echo USER_PHOTO; ?>"></niceimg>
				</a>
				<h5 class="user-name">Hi <?php echo ucwords(USER_NAME); ?> ! </h5>
				<?php
					if(defined('USER_ROLE')){
					?>
						<small class="text-muted"><?php echo USER_ROLE; ?> </small>
					<?php
					}
				?>
				<div class="menu-dropdown">
					<b-nav-item-dropdown right>
						<template slot="button-content">
							<i class="fa fa-user"></i>
						</template>
						<b-dropdown-item href="#account"><i class="fa fa-user"></i> My Account</b-dropdown-item>
						<b-dropdown-item href="<?php print_link('index/logout?csrf_token='.Csrf::$token) ?>"><i class="fa fa-sign-out"></i> Logout</b-dropdown-item>
					</b-nav-item-dropdown>
				</div>
			</div>

			<?php render_menu($navbarsideleft  , 'left'); ?>
		</b-navbar-nav>
		<b-navbar-nav>
			
		</b-navbar-nav>

		<!-- Right aligned nav items -->
		<b-navbar-nav class="ml-auto">
			
			
				<b-nav-item-dropdown right>
					<template slot="button-content">
						<niceimg single width="30" height="30" path="<?php echo USER_PHOTO; ?>"></niceimg>
						<span>Hi <?php echo ucwords(USER_NAME); ?> !</span>
					</template>
					<b-dropdown-item to="/account"><i class="fa fa-user"></i> My Account</b-dropdown-item>
					<b-dropdown-item href="<?php print_link('index/logout?csrf_token='.Csrf::$token) ?>"><i class="fa fa-sign-out"></i> Logout</b-dropdown-item>
				</b-nav-item-dropdown>

		</b-navbar-nav>
		
	</b-collapse>
	<?php
		}
	?>
</b-navbar>
</div>
</template>

<script>
	var AppHeader = Vue.component('AppHeader', {
		template:'#AppHeader',
		mounted:function(){
			//let height = this.$el.offsetHeight;
			if(this.$refs.navbar){
				var height = this.$refs.navbar.offsetHeight;
				document.body.style.paddingTop = height + 'px';
				
				if(this.$refs.sidebar){
					this.$refs.sidebar.style.top = height + 'px';
				}
			}
		}
	})
</script>

<?php
	/**
	 * Build Menu List From Array
	 * Support Multi Level Dropdown Menu Tree
	 * Set Active Menu Base on The Current Page || url
	 * @return  HTML
	 */
	function render_menu($arrMenu,$slot="left"){
		if(!empty($arrMenu)){
			foreach($arrMenu as $menuobj){
				$path = trim($menuobj['path'],"/");
				
				if(PageAccessManager::GetPageAccess($path)=='AUTHORIZED'){

					if(empty($menuobj['submenu'])){
						?>
						<b-nav-item to="/<?php echo ($path); ?>">
							<?php echo (!empty($menuobj['icon']) ? $menuobj['icon'] : null); ?> 
							<?php echo $menuobj['label']; ?>
						</b-nav-item>
						<?php
					}
					else{
						$smenu=$menuobj['submenu'];
						?>
						<b-nav-item-dropdown right>
							<template slot="button-content">
								<?php echo (!empty($menuobj['icon']) ? $menuobj['icon'] : null); ?> 
								<?php echo $menuobj['label']; ?>
								<?php if(!empty($smenu)){ ?><i class="caret"></i><?php } ?>
							</template>
							<?php
								if(!empty($smenu)){
									 render_submenu($smenu);
								}
							?>
						</b-nav-item-dropdown>
						<?php 
					}
				}
			}
		
		}
	}
	
	/**
	 * Render Multi Level Dropdown menu 
	 * Recursive Function
	 * @return  HTML
	 */
	function render_submenu($arrMenu){
		if(!empty($arrMenu)){
			foreach($arrMenu as $key=>$menuobj){
				$path =  trim($menuobj['path'],"/");
				if(PageAccessManager::GetPageAccess($path)=='AUTHORIZED'){
					?>
					<b-dropdown-item to="/<?php echo($path); ?>">
						<?php echo (!empty($menuobj['icon']) ? $menuobj['icon'] : null); ?> 
						<?php echo $menuobj['label']; ?>
						<?php
							if(!empty($menuobj['submenu'])){
								render_menu($menuobj['submenu']); 
							}
						?>
					</b-dropdown-item>
					<?php
				}
			}
		}
	}
?>