<footer class="section-footer bg-secondary">
	<div class="container">
		<?php
		$footers=\App\CustomFooter::all();
		$footer=$footers[0];
		?>
		<section class="footer-top padding-top">
	{!! base64_decode($footer->description) !!}
			<div class="row">
				<div class="col-md-6 offset-md-5">
					<div class="btn-group white">
						<a class="btn btn-facebook" title="Facebook" target="_blank" href="{{$footer->facebook_link}}"><i class="fab fa-facebook  fa-fw"></i></a>
						<a class="btn btn-instagram" title="Instagram" target="_blank" href="{{$footer->instagram_link}}"><i class="fab fa-instagram  fa-fw"></i></a>
						<a class="btn btn-youtube" title="Youtube" target="_blank" href="{{$footer->youtube_link}}"><i class="fab fa-youtube  fa-fw"></i></a>
						<a class="btn btn-twitter" title="Twitter" target="_blank" href="{{$footer->twitter_link}}"><i class="fab fa-twitter  fa-fw"></i></a>
					</div>
				</div>
			</div>
			<br> 
		</section>
		<section class="footer-bottom row border-top-white">
			<div class="col text-center"> 
				<span>Copyright &copy <a href="{{ url('/') }}">www.autosheba.com</a> Site Design & Developed By <a href="https://www.asbict.com">www.asbict.com</a></span>
			</div>
		</section>
	</div>
</footer>
