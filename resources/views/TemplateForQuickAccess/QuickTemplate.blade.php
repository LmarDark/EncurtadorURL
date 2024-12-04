@vite('resources/css/app.css')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{$nome}}</title>

<div 
    class="absolute inset-0 bg-cover bg-center z-[-1]" 
    style="background-image: url('{{ $background }}');">
</div>

<div class="flex-h-center" id="background_div">
    <div class="mt-16 page-full-wrap flex flex-col items-center">
        <img src="{{ $foto }}" class="border border-black rounded-full w-[150px] h-[150px] select-none object-cover" style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5);" draggable="false">
        <h2 class="mt-6 text-center font-bold text-xl">{{ $nome }}</h2>
        <div class="mt-2 mr-52 ml-52 text-justify text-slate-600">{{ $descricao }}</div>

    <div class="flex flex-wrap mt-4">
        @if($website !== null)
        <div class="relative mr-2">
            <a class="select-none" href="{{ $website }}">
                <img class="social-icon-fill" src="https://foras.ca/wp-content/uploads/2024/07/Website.png" style="width:50px;height:50px;">
            </a>
        </div>
        @endif

        @if($email !== null)
        <div class="relative mr-2">
            <a class="select-none" target="_blank" href="mailto:{{ $email }}">
                <img class="social-icon-fill" src="https://foras.ca/wp-content/uploads/2024/07/Mail.png" style="width:50px;height:50px;">
            </a>
        </div>
        @endif
        
        @if($linkedin !== null)
        <div class="relative mr-2">
            <a class="select-none" target="_blank" href="{{ $linkedin }}">
                <img class="social-icon-fill" src="https://foras.ca/wp-content/uploads/2024/07/LinkedIn.png" style="width:50px;height:50px;">
            </a>
        </div>
        @endif

        @if($twitter !== null)
        <div class="relative mr-2">
            <a class="select-none" target="_blank" href="{{ $twitter }}">
                <img class="social-icon-fill" src="https://foras.ca/wp-content/uploads/2024/07/X.png" style="width:50px;height:50px;">
            </a>
        </div>
        @endif

        @if($instagram !== null)
        <div class="relative mr-2">
            <a class="select-none" target="_blank" href="{{ $instagram }}">
                <img class="social-icon-fill" src="https://foras.ca/wp-content/uploads/2024/07/Instagram.png" style="width:50px;height:50px;">
            </a>
        </div>
        @endif

        @if($facebook !== null)
        <div class="relative mr-2">
            <a class="social-icon-anchor" target="_blank" href="{{ $facebook }}">
                <img class="social-icon-fill" src="https://foras.ca/wp-content/uploads/2024/07/Facebook.png" style="width:50px;height:50px;">
            </a>
        </div>
        @endif

        @if($tiktok !== null)
        <div class="relative mr-2">
            <a class="social-icon-anchor" target="_blank" href="{{ $tiktok }}">
                <img class="social-icon-fill" src="https://foras.ca/wp-content/uploads/2024/07/TikTok.png" style="width:50px;height:50px;">
            </a>
        </div>
        @endif

        @if($whatsapp !== null)
        <div class="relative mr-2">
            <a class="social-icon-anchor select-none" target="_blank" href="{{ $whatsapp }}">
                <img class="social-icon-fill" src="https://foras.ca/wp-content/uploads/2024/07/Whatsapp.png" style="width:50px;height:50px;">
            </a>
        </div>
        @endif

        @if($youtube !== null)
        <div class="relative mr-2">
            <a href="{{ $youtube }}" target="_blank">
                <svg fill="#ff0000" height="50px" width="50px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-143 145 512 512" xml:space="preserve" stroke="#ff0000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M113,145c-141.4,0-256,114.6-256,256s114.6,256,256,256s256-114.6,256-256S254.4,145,113,145z M272.8,560.7 c-20.8,20.8-44.9,37.1-71.8,48.4c-27.8,11.8-57.4,17.7-88,17.7c-30.5,0-60.1-6-88-17.7c-26.9-11.4-51.1-27.7-71.8-48.4 c-20.8-20.8-37.1-44.9-48.4-71.8C-107,461.1-113,431.5-113,401s6-60.1,17.7-88c11.4-26.9,27.7-51.1,48.4-71.8 c20.9-20.8,45-37.1,71.9-48.5C52.9,181,82.5,175,113,175s60.1,6,88,17.7c26.9,11.4,51.1,27.7,71.8,48.4 c20.8,20.8,37.1,44.9,48.4,71.8c11.8,27.8,17.7,57.4,17.7,88c0,30.5-6,60.1-17.7,88C309.8,515.8,293.5,540,272.8,560.7z"></path> <path d="M196.9,311.2H29.1c0,0-44.1,0-44.1,44.1v91.5c0,0,0,44.1,44.1,44.1h167.8c0,0,44.1,0,44.1-44.1v-91.5 C241,355.3,241,311.2,196.9,311.2z M78.9,450.3v-98.5l83.8,49.3L78.9,450.3z"></path> </g> </g></svg>
            </a>
        </div>
        @endif
    </div>
</div>
    @isset($personalizados)
        @foreach($personalizados as $key => $value)
        <a href="{{ $value }}" target="_blank">
            <div class="flex justify-center p-4 m-4 mr-52 ml-52 rounded-xl bg-slate-300">{{ $key }}</div>
        </a>
        @endforeach
    @endisset

</div>

