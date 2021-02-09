<!DOCTYPE html>
<html lang="en">
    <head>
        @include('comp._head')
    </head>

    <body>
		<div class="loader-bg">
			<div class="loader-bar"></div>
        </div>
        
		<div id="pcoded" class="pcoded">
			<div class="pcoded-overlay-box"></div>
			<div class="pcoded-container navbar-wrapper">
				@include('comp._nav')
				<div class="pcoded-main-container">
					<div class="pcoded-wrapper">
                        @include('comp._side')
						<div class="pcoded-content">
							{{-- @include('comp._bread') --}}
							<div class="pcoded-inner-content">
								<div class="main-body">
									<div class="page-wrapper">
										<div class="page-body">
											@yield('content')
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
    	@include('comp._script')
	</body>
</html>