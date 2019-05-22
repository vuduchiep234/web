@extends('user.master')
@section('content')


<section class="popular-course-area section-gap">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-70 col-lg-8">
				<div class="title text-center">
					<h1 class="mb-10">New Book</h1>
					<p>There is a moment in the life of any aspiring.</p>
				</div>
			</div>
		</div>
		<div class="row" id="list_book">
			<div class="active-popular-carusel" id="_list_book">
				<input type="hidden" name="publisher" id="publisher" value="">

				
			</div>

		</div>
	</div>
</section>

@endsection
