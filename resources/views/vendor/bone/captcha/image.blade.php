<img src="{{ $route }}"
     alt="Loading captcha..."
     style="cursor:pointer;width:{{ $width }}px;height:{{ $height }}px;border-radius: 4px"
     title="{{ $title }}"
     onclick="this.setAttribute('src','{{ $route }}&_='+Math.random());var captcha=document.getElementById('{{ $input_id }}');if(captcha){captcha.focus()}"
>
