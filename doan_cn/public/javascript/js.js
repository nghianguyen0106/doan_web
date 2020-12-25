 // SCROLL TOP
    
     var nut = document.getElementById("scroll");
        //Truy xuất icon
        nut.onclick = function(){
            var chieucaoht = self.pageYOffset;
            // lấy chiều cao hiện tại của trang
            var set = chieucaoht;
            var run = setInterval(function(){
                chieucaoht = chieucaoht - 0.05*set;
                window.scrollTo(0,chieucaoht);    
                if(chieucaoht <= 0){
                    clearInterval(run);
                }        
            },15)
        }