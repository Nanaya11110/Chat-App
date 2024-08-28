@include('Layout.Header')
@include('sweetalert::alert')

<body>

    <div class="w-full h-screen bg-blue-950">
        <div class="flex h-full">
            @livewire('SideBar')
        </div>
        @livewire('home')
    </div>
    </div>
</body>

</html>

<script>
    if (window.innerWidth < 768) {
        //alert('123');
    }
    $('.list').click(function() 
    {
        if ($('.sidebar').show()) 
        {
            $('.sidebar').show()
            $('.SideBar').hide()
            $('.chat-area').hide();
            console.log('CHAT AREA');
        } else {
            $('.sidebar').hide()
            $('.SideBar').show()
            $('.chat-area').show();
            console.log('SIDE BAR');
        };
    });
    $('.MainMenu').click(function() 
    {
        if ($('.SideBar').hide()) 
        {
            //alert('hide');
            //console.log($('.SideBar'));
            $('.SideBar').show()
            $('.chat-area').hide();
            $('.sidebar').hide();
            console.log('SideBar');
        } else {
            alert('show');
            $('.sidebar').show()
            $('.chat-area').hide();
            $('.SideBar').hide();
            console.log('SIDEBAR GONE');
        };
    });
</script>
