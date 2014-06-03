<?php
include 'header.php';
?>

<script type="text/javascript" src="<?php echo JS_DIRECTORY ?>/snap.svg-min.js"></script>
<div class="container maincontent">
    <div class="row">
        <div class="col-md-12 smallvid">
            <div class="smallvid-title">
                <h3>Produits Phares</h3>
            </div>
            <div class="smallvid-player" style="height: auto;">
                <section id="grid" class="grid clearfix">
                    <a href="#" data-path-hover="m 0,0 0,47.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z">
                        <figure>
                            <img src="../content/images/2.png" />
                            <svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z"/></svg>
                            <figcaption>
                                <h2>Crystalline</h2>
                                <p style="color:#424242;">Soko radicchio bunya nuts gram dulse.</p>
                                <button>View</button>
                            </figcaption>
                        </figure>
                    </a>
                    <a href="#" data-path-hover="m 0,0 0,47.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z">
                        <figure>
                            <img src="../content/images/2.png" />
                            <svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z"/></svg>
                            <figcaption>
                                <h2>Crystalline</h2>
                                <p style="color:#424242;">Soko radicchio bunya nuts gram dulse.</p>
                                <button>View</button>
                            </figcaption>
                        </figure>
                    </a>
                    <a href="#" data-path-hover="m 0,0 0,47.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z">
                        <figure>
                            <img src="../content/images/2.png" />
                            <svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z"/></svg>
                            <figcaption>
                                <h2>Crystalline</h2>
                                <p style="color:#424242;">Soko radicchio bunya nuts gram dulse.</p>
                                <button>View</button>
                            </figcaption>
                        </figure>
                    </a>
                    <a href="#" data-path-hover="m 0,0 0,47.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z">
                        <figure>
                            <img src="../content/images/2.png" />
                            <svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z"/></svg>
                            <figcaption>
                                <h2>Crystalline</h2>
                                <p style="color:#424242;">Soko radicchio bunya nuts gram dulse.</p>
                                <button>View</button>
                            </figcaption>
                        </figure>
                    </a>
                    <a href="#" data-path-hover="m 0,0 0,47.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z">
                        <figure>
                            <img src="../content/images/2.png" />
                            <svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z"/></svg>
                            <figcaption>
                                <h2>Crystalline</h2>
                                <p style="color:#424242;">Soko radicchio bunya nuts gram dulse.</p>
                                <button>View</button>
                            </figcaption>
                        </figure>
                    </a>
                    <a href="#" data-path-hover="m 0,0 0,47.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z">
                        <figure>
                            <img src="../content/images/2.png" />
                            <svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z"/></svg>
                            <figcaption>
                                <h2>Crystalline</h2>
                                <p style="color:#424242;">Soko radicchio bunya nuts gram dulse.</p>
                                <button>View</button>
                            </figcaption>
                        </figure>
                    </a>

                </section>
            </div>
        </div>
    </div>


</div>

<script>
    (function() {

        function init() {
            var speed = 330,
                    easing = mina.backout;

            [].slice.call(document.querySelectorAll('#grid > a')).forEach(function(el) {
                var s = Snap(el.querySelector('svg')), path = s.select('path'),
                        pathConfig = {
                            from: path.attr('d'),
                            to: el.getAttribute('data-path-hover')
                        };

                el.addEventListener('mouseenter', function() {
                    path.animate({'path': pathConfig.to}, speed, easing);
                });

                el.addEventListener('mouseleave', function() {
                    path.animate({'path': pathConfig.from}, speed, easing);
                });
            });
        }

        init();

    })();
</script>

<?php include 'footer.php'; ?>