</main>
<!-- !start #main-site -->

<!-- start #footer -->
<footer id="footer" class="bg-dark text-white py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12">
                <h4 class="font-rubik font-size-20">Aluminuim Shop</h4>
                <p class="font-size-30 font-rubik text-white-50">306/15 หมู่บ้านกฤษณาร่มเกล้า ถ.ร่มเกล้า แขวง/เขต มีนบุรี กรุงเทพฯ 10510</p>
            </div>
            <div class="col-lg-4 col-12">
                
            </div>
            <div class="col-lg-3 col-12">
                <div class="d-flex flex-column flex-wrap">
                    <a href="#" class="font-rubik font-size-17 text-white-50 pb-1">Line @aluminiumshop62</a>
                    <a href="#" class="font-rubik font-size-17 text-white-50 pb-1">เบอร์ 081-323-7233</a>
                    <a href="#" class="font-rubik font-size-17 text-white-50 pb-1">facebook อลูมิเนียมช้อป</a>
                    <a href="#" class="font-rubik font-size-17 text-white-50 pb-1">IG Alumiuim_shop62</a>
                </div>
            </div>
            <div class="col-lg-2 col-12">
                <div class="d-flex flex-column flex-wrap">
                    <a href="#" class="font-rubik font-size-17 text-white-50 pb-1">คำถามที่พบบ่อย</a>
                    <a href="#" class="font-rubik font-size-17 text-white-50 pb-1">นโยบายการคืนเงิน</a>
                    <a href="#" class="font-rubik font-size-17 text-white-50 pb-1">นโยบายและความเป็นส่วนตัว</a>
                    <a href="#" class="font-rubik font-size-17 text-white-50 pb-1">ข้อตกลงและเงื่อนไข</a>
                </div>
            </div>
        </div>
    </div>
</footer>



<!-- !start #footer -->

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function checkusername(val) {
        $.ajax({
            type: 'POST',
            url: '../checkuser_available.php',
            data: 'username='+val,
            success: function(data) {
            $('#usernameavailable').html(data);
            }
        });
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
        let imgInput = document.getElementById('imgInput');
        let previewImg = document.getElementById('previewImg');

        imgInput.onchange = evt => {
            const [file] = imgInput.files;
                if (file) {
                    previewImg.src = URL.createObjectURL(file)
            }
        }
</script>
<!-- Owl Carousel Js file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>

<!--  isotope plugin cdn  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha256-CBrpuqrMhXwcLLUd5tvQ4euBHCdh7wGlDfNz8vbu/iI=" crossorigin="anonymous"></script>

<!-- Custom Javascript -->
<script src="../index.js"></script>

<!-- Search Javascript -->
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
        $(document).ready(function() {
        var table = $('#myTable').DataTable( {
        rowReorder: {
            selector: 'td:nth-child(4)'
        },
        responsive: true
    } );
} );
</script>
</body>
</html>