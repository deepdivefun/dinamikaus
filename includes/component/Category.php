<div class='mt-8 mx-6'>
  <h2 class='font-semibold text-2xl text-center'>Telusuri Kategori Populer</h2>
  <div class='mt-6 relative'>
    <button id="prev" class="absolute left-0 top-1/2 transform -translate-y-1/2 z-10 bg-gray-100 text-black p-2">
      &#10094;
    </button>
    <div class="overflow-hidden">
      <div id="slider" class='slider flex space-x-4 overflow-x-auto scroll-smooth'>
        <div class='w-32 h-32 flex-shrink-0'>
          <img class='w-full h-full' src="./assets/img/image1.jpg" alt="">
        </div>
        <div class='w-32 h-32 flex-shrink-0'>
          <img class='w-full h-full' src="./assets/img/image1.jpg" alt="">
        </div>
        <div class='w-32 h-32 flex-shrink-0'>
          <img class='w-full h-full' src="./assets/img/image1.jpg" alt="">
        </div>
        <div class='w-32 h-32 flex-shrink-0'>
          <img class='w-full h-full' src="./assets/img/image1.jpg" alt="">
        </div>
        <div class='w-32 h-32 flex-shrink-0'>
          <img class='w-full h-full' src="./assets/img/image1.jpg" alt="">
        </div>
        <div class='w-32 h-32 flex-shrink-0'>
          <img class='w-full h-full' src="./assets/img/image1.jpg" alt="">
        </div>
        <div class='w-32 h-32 flex-shrink-0'>
          <img class='w-full h-full' src="./assets/img/image1.jpg" alt="">
        </div>
        <div class='w-32 h-32 flex-shrink-0'>
          <img class='w-full h-full' src="./assets/img/image1.jpg" alt="">
        </div>
         <div class='w-32 h-32 flex-shrink-0'>
          <img class='w-full h-full' src="./assets/img/image1.jpg" alt="">
        </div>
         <div class='w-32 h-32 flex-shrink-0'>
          <img class='w-full h-full' src="./assets/img/image1.jpg" alt="">
        </div>
         <div class='w-32 h-32 flex-shrink-0'>
          <img class='w-full h-full' src="./assets/img/image1.jpg" alt="">
        </div>
      </div>
    <button id="next" class="absolute right-0 top-1/2 transform -translate-y-1/2 z-10 bg-gray-100 text-black p-2">
      &#10095;
    </button>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const slider = document.getElementById('slider');
    const next = document.getElementById('next');
    const prev = document.getElementById('prev');

    next.addEventListener('click', () => {
      slider.scrollBy({ left: 100, behavior: 'smooth' });
    });


    prev.addEventListener('click', () => {
      slider.scrollBy({ left: -100, behavior: 'smooth' });
    });
  });
</script>

<style>
    .slider {
    overflow: hidden; 
}
</style>
