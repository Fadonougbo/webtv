<section class="w-full flex flex-col items-center my-10 text-xl sm:flex-row sm:justify-center sm:gap-3" >

    <!--  http://twitter.com/share?url=&text=-->

    @php
        $route= route('home.show',['post'=>$post->id,'slug'=>$post->getSlug()]) ;

        $urlEncoded=urlencode($route);

        $encodeTitle=urlencode($post->title);

        
       
    @endphp
    <p class="uppercase font-semibold " >Partager sur :</p>
    <div class="flex my-2 space-x-3 items-center " >
        <a href="http://twitter.com/share?url={{$urlEncoded}}&text={{$encodeTitle}}" class="hover:opacity-80 text-xl" >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="38"
              height="38"
              viewBox="0 0 24 24"
              class="fill-current">
              <path
                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path>
            </svg>
        </a>
        <a href="https://www.facebook.com/sharer.php?u={{$urlEncoded}}" class="hover:opacity-80" >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="38"
              height="38"
              viewBox="0 0 24 24"
              class="fill-current">
              <path
                d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path>
            </svg>
          </a>

          <a href="mailto:?subject={{$encodeTitle}}&body={{$urlEncoded}}" class="opacity-85 hover:opacity-75">
            
            <svg width="55" height="55" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" >
            <path d="M4 7.00005L10.2 11.65C11.2667 12.45 12.7333 12.45 13.8 11.65L20 7" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <rect x="3" y="5" width="18" height="14" rx="2" stroke="#000000" stroke-width="2" stroke-linecap="round"/>
            </svg>
          </a>
    </div>

</section>