<html>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<body >
<div class="card col-10" style="top:5px;padding:20px;border-radius:15px;margin:auto;position:relative;background: rgba(253, 180, 80,0.07)">
    <div class="container " id="main-panel" style="margin-left:200px;z-index: 1000">
        <div class="col-sm-8 col-md-8 col-xl-9">
            <div class="card col-md-12">
                <div class="card-body" style="background: #ffffff;height:85vh;border-radius: 15px ;
            -webkit-box-shadow: 0px 1px 5px 4px rgba(227,227,227,0.59);
            -moz-box-shadow: 0px 1px 5px 4px rgba(227,227,227,0.59);
            box-shadow: 0px 1px 5px 4px rgba(227,227,227,0.59);
                ">
                    <button class="btn btn-info" onclick="openClose()">menu</button>

                </div>
            </div>
        </div>
    </div>
</div>


</body>
<script>
    let panel=$("#main-panel");
    let menuOpen=true;
    let openClose=()=>{
        menuOpen=!menuOpen;
        panel.animate({marginLeft: menuOpen ? "200px" : "5px"});
    }
</script>
</html>
