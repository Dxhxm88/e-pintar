<?php
include('config/include.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title><?= $_ENV['APP_NAME'] ?></title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" type="text/css" href="<?= route('css/style.css') ?>">
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <?php include('inc/topbar.php') ?>

        <section class="py-5">
            <div class="container px-5 my-5">
                <form method="post" action="search-result.php">
                    <aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5 mt-5">
                        <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                            <div class="mb-4 mb-xl-0">
                                <div class="fs-3 fw-bold text-white">Search Teacher by Name or Subject</div>
                            </div>
                            <div class="ms-xl-4">
                                <div class="input-group mb-2">
                                    <input class="form-control" type="text" placeholder="Search Teacher by Name or Subject" aria-label="Email address..." aria-describedby="button-newsletter" name="searchinput" required style="width:350px;" />
                                    <button class="btn btn-outline-light" id="button-newsletter" type="submit">Search</button>
                                </div>
                            </div>
                        </div>
                    </aside>
                </form>
                <hr />
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <div class="text-center">
                            <h2 class="fw-bolder">Listed Teachers</h2>
                            <hr color="red" />
                        </div>
                    </div>
                </div>
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAoHCBUWFRgWFhYYGBgYGBoYGBgYGhgYGRgaGhgZGhgYGhgcIS4lHB4rHxgYJjgmKy8xNTU1GiQ7QDs0Py40NTEBDAwMEA8QHhISHjQhISM0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQxNDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQxNP/AABEIALkBEQMBIgACEQEDEQH/xAAbAAABBQEBAAAAAAAAAAAAAAACAAEDBAUGB//EAEkQAAIBAgMDBgoFCwEJAQAAAAECAAMRBBIhMUFRBQZhcYGREyIyUpKhscHR0gdCYnLwFBYjMzRjgpOisuFTFVRzg6OzwuLxQ//EABoBAAMBAQEBAAAAAAAAAAAAAAABAgMEBQb/xAAkEQEAAgEEAgICAwAAAAAAAAAAAQIRAxIhMRNRFEEEIjJhcf/aAAwDAQACEQMRAD8A4i0IRQlHGdLzyBhKYiu+MIA948bLGtACEREaPAFCBiIiywI8JYEJDJAssYws0YyiMBFaK0eCQWgsIesZrwCEiAQZOYBY9MCygMYiSmAxkllHaLLCMV4GjtERDMGADGIhmMYDKMiCwktoBgqJRkQSJIYBky0rKFhAYSZhAYSWtZRWijxQXlvgaRARwISibOTIY4ij2gMnKxwl9kG0dSYDJikYCSAmNeB5NDAjAwoA1olj3i6oERjqIDSRNLnoIHWdD6ifVBIY4MG8Kkt9uzbAGMRMTQXECkmEjMMmCwgnILCARDMEwGUZWDaEYJgCtAMKMRJUYwTHvFAGgmEWgkwOAmDaEYJiVCNoDCSNI2ky2rILRQool5bwEJNI0e02cwiIOWIRzABtHCwrGFRpFmCjeQOgdJ6IBEIQEsVKqqSqKpF/LdQzN05WuFHRa/TFRqI/iPlW50dVClT9oLYMvHS43cCBXtHDQ6qFSUYWZSQesaGIrAg5hugBpIVEBl6IAY6oBaODGFoEQMDFYgIp3k/Vvqf8bJIhAmetBqlS41ubKJNrYhro6e+3PSB8RVbVTboG74yKolXaS27fxnonJXMSo6hnYJfXiZfxH0fUrWzv133jfac9rxD0q6EfUPKPD1UI8Y7Nh1vaamExYdb7OImny5zZqUCTcOu6+hE5jDVMj23E2PXulU1P7c/5H4/65iMTDaYQWEcn8dkYrOh5eTZYDCSCJoKiUNoLQyIxSSEVoJMlZDHpUGc5VFzt6AN5JOwdJgqFcxGXqlGithnZzvyKAoPAOxu3XlECnh1eyoWzm9lYCzHcFYfWOyxGvHdBWFIwSYZgGI4C0AwjAMmWtTWijRRLdEBETGJjTZge8RMaPeAHmljDGyO2/KEHRnOtv4Q47ZWvJ81qN+NS3ooPnMCQ3MbIOFpawaF1qKoJYoCANSQrqzWG8gC/UDIcNQLuEG0m19wH1mPQBc9kAm5Q1KNtJp0y1jfUKF16bASujyfGVAzsy6Leyjgo0UeiBIrA9cCkJbojhpJkW2pN+oe28jIXdftIgQY0IndAEAYzX+jzk9qlXPbxUOptp38ZkM1gTwBnoX0b4VqeHqhgVJcMLi91ZFINh2zn1rY4d/4VZnMu5RbCQVRecZj+cFZXUKuKVSdrrSIsDa5S2ZQbbNtjsmry3yq9KkjhTd9BpqDa+zjOe0xD0a1lX5doZgQRpaeL8rYVkrFTvYEHovtndvyhVzfpKeJckgZmci2YaWRLC3HbtnNc78OboxBuAxPHda8mk7bY9jVrupmPohrEZVoVtBJ1eejExL5u1ZrOB1VvBj54xEZZAwgsslZRBZDBSAy9jn8GvgF2ixrHzqm3J91PJt5wY8LByWVFekWtlFRL32WzDb0StXVgzB75sxzX25r+NftvJVHSEmOlUqQy6FSGB6Qbj1iEiZiANpIA7dI2Ip5WZTtUlT1gkQP+03KtMLWdRa2ckdR8YeoykRNLl0fpm+7T/wC2kzjEv7RmA0kMBhJXVHaKPFEtvkaxGSFbSK02YnjWiMeAOJZrD9EnS9Q+qmPdKl5bqfqk+/UHqpn3wCCk5UhgbEEEEEggg3BBG+80OUq7tlbYKiITba5UZHLHa3jox1Ouh2zOUS7hKgdfBPsJvTbelQ2G3zGsAR1HdqEqZo8ToVYg6EEgjgRoRGvAjiMwj3jEQIrxo0cyQCvqh6veJ6xzIqI2FoOpuTTVX1+tTuhv2qe6eVlbq3V75pfRjykUxD0ndsjqwRSxyhwc/irsFxnOk59bnn09T8TiuPcvWsRTpFxmAZtw226bTL5z1UC02zLo2guNbyehTdWZ1VXB23Yhh1aG47py3OVFY5jTW4OgFTS/AJbb2TmzM1zh6dKZtxzh0I8CaYdQLlb37J5lzxqqyOxOugXpuwBnT06riic4CFtEQG5tpqxsLb9J5vzpxWasUVjlUBSLmxa5JuO0Saftb/C1pitP9Q0n0EsJUlGidBJ1ad9bPC1KcyvBpKW09f49coo0mR5pEua1cJr7ozNAzRceyPKMEzSzTArELsqaKDYkPbQZrAkMBbW1jbW201LazQqVBQAVP121330z5lPgwHlNtBNhaxJSqx7RBfAm5sag8kDUIfPJ2FuA3bTwme0kq1CxuSSeJ1PXffIm2HqgbQ5dW1Yj7FMf9NJmMJqc4f2h+tR/QsyzEqe5CwgNCMExSuAXjxWjyWjecwLxM8G82ZFHvGivJA5a/wDxQ8Kr/wBiSnLjfs6/8V/7EgSEgjaLaA9hFwe4xspkuOb9I44MVHUvij1CREwKV7lbVw++oiOfvEWf+pWPbKVpc5Q0Sh00b/8AUqD3SlApOI7bIIMJhAgxEwSYhA8STVbacf8A5KfN7BvUxACNlKP4Rn8xaerNpqdSFA3lgN8GoXLbNuig+2dzzG5EKYfGORd1RDcbbK5qso6/BrOa2ZzP09TTxWsRPbvfygU9GHinYfcZkcp4rD6sEBPtnQDK6A6EEX75yHLHJpzHLsnJeZiHo6eJnntx3OXlaoFdlGuwbwq7z2TgFYk3JuSbkneTtM9Mr8nZy4I8VKNV24XKFFHe3qnmb02Tdpxm+jX9cub8i07l2mZKplGk+stqZvVxakc5WUMMGRqYYlw5rwmBj3gLCZpbnmF/koBS9Yi4pLmW+wuxy0+ux8b+CZ9UMD417mza7SGAYHpuCD2zWwqDwCZhdWepUcbLrRRQq36S5H8UysRXZ3Z2PjMbnh0ADcALADcBBUxiERk1Vf0SHi9QX36LT+b2yEiXEW6Ul41X9a0BARA+cX7TV6Ht3ACZkvctNfEVj+8qf3GUCYpP7MYBhGCYpXBooooltYNHvIhCEvKEl4rxhHAgQry437Ov/Ff+xJTlwfqB0VT60HywIuUreFqEbC7MOpjmHqIkFo7PfuA7hYeoQSYJloYtGdMOANfBMOwVqutzsAvtgrSor5dRnO8U1Fh/G5F+xZJjcXelSRDZQln2XLh3bKd9hnvbZ41+qrhkpnR2db7Cqh7feBYEjqgafweHbQO6Hi6Ky9pQ3HcYX+zXLCzIyEgF0YMB1jQr2gSpVQKbKwYbmW+vDQ6g9BmhyPQvnY7LBfSvc9lhHEZOsbpwVfBKq3VQbEg31OhtrKOIAyXFgNulvdL3hyGZW2gjMfOGgzdGlpnkZWdCNjHuMcxDsrGOk3JWGUZWy3LC+tzYW01PHU9onpv0eLda5tozKNm2wb4zzXk4PsOqqLBt6jzemeqfR6gGHe201Gv6K29Um/8AFVeyw1BqJaidiHxOlD5PcNOwyXEUCVJy6nQDeTNPlSolwtsz7rbV6SeEJvEUm12AuCZxTpc4+nX5uM/bkuV8GKWGrLtc03eoRxyMEXqFz2kzyV8ACctt2txPbcTg81KpmOrjKT0E2PqvPLq+SmWZiAo3nh1TppWIjDnvabTliYbkdGFyo3g7tQbHZt1ktbkVAL5ip7x3HWa/I6F0LkEBnJVTuW20i++xNumQK/jvVfVEfKiccpyiy/WJbdNNsYZzy5/E4VqbBWtqLi3v4GNRRmNlUseAFzLGMBdznIDE3beKa2NlNtp1ubdAjrVDEU0siGwJdsub7VRu/wAUaDcCdsfbG9cEcKRoXRTvBdbjrtcCDUouozEeKdMwIZfSGkmenRUW8Izn7CEJ6TkMfRlelWZDmU23a6gjgw2EdBlMJiGmmJAwy33+GpnoJ8E6nvWZE0K9emaFho7Vc+QA2QZCrancTksNTtvs1zjGUlNHDm9XDJ5rUwfvO4Y+plH8MzZf5CF8TS6HVvROY+yIR2rY971HPF3PexlYmEzX1gEQk4C0EwjBYyWkGiiiiU0QZIsiBhrLZJFMIGAIcYPeX8MM1Gqu9WpuOrxkb+9ZQLSXDVsjBrA7ip2MCLMp6CCRAgxGWcZhcuV0JZH1Rt4I8pHtsdbi/HQjQyteCZKFeADCBgRxOi5Op5aIvtclzu2gW9QB7Zzc6N701UXJAUKw3kgWuPxslVbaMftlm41/HzcdG26g6HX1yPlFLPm111PHcTA5Udcum/uPVuBlq2dKbcUF9Dty290HU0KY1tusALTteYNc5KyC1wykcBmW3/jOHwp8QXOwZD2f4AnWcwXtVqrxRG7iQfbFb+J17dpg8KFLEkszG5JkmIW/i8R74SnWPWXUHoPtExUyeVtKNS31KfrJv7hPI8Thw5IZQdL66gEbDbsnsPL/AOzVfuGeRYbWp28JrXorJ8NVABQ+UoDdYO+ZmHOWkH2uzEU126sfK67a33X65FUxVq+IbclML2i7H2+qWaFEAqt7rTUKL73I8Y9ceckyuU8OETKNvlMd5MyUab3LS2p3Nrtu37JzaPM7cSi9cwsgw1kKvDBhEua1cCaKKNKRgiZf5FNqhbzKdVu6k4HrImeZf5KNhXY7sO/e7ogH9cDrHLOjGOTGMRwEwDDMAyZaQGKKKC2msNZHmhLLYJbwhIgYQJgSRo4kd4QMClbw+KZAQMpU2JVlV1JF7EqwIvqdemTPjEPl0E60Z0PdmK/0yiGgtGF79Ad9VOsJUH/hBFGlurdjU2H9paU7xAwJepUaZYLnckkDSmANdNpf3TZxLkAjaDfePUd346ph8lDNWQfaB7tfdNzGb+rTpHVvlV6b6MdsDlFxlO3TbbhvuOM0OS3XwKX10Njs0zH3ShjVt+D2DqhckVBkA3Lp6zb8dcInl0NtEC3tsPq2X9Vts3uZNUflVh9am/RsZTb2zk6+KAF9w2jdwPqvNDmrjwuMo2NwWZSPvK1rdsVp4Fe3sSNrCcajqPrt8JBSqAnSSlxeZLZ/OM2wtY/YPrIHvnkmEFnYkaDX1T1DnniQuEqfayL3uvuBnj+PxRWm9jYsSAes2/z2S6ziMlPbOoOCrE6ms4HYX9gW/dOgwdspdtcxuLjYv4ue6Y3NzkZ8TiERNEQFnfaEBBUacTrYdHRPS+UOQ8OgQO3g6aCxGjVKpOy/RewAF+FpMalY7aeKZ6ebcqMpbO9wuxE+sw87oBM5jPqd2uzh0TuuW8Gys90NMtd1VyGqeDLMEDeZovkkAziGqsCRmO0+2K3PLOY+kuGdM3j5stj5FswNtDY6HXdp1y82JoAWSkx+1UqEnsVAoHbeUExT+cfVJ1xtTz2HUbeyKJZWqdULeSCeoEyZcHUOxH6yrAd5FpEcW52u5/ib4wGa+3XrlMZhZ/I3+yOupTHtaWfA+Do1M5XM5REUMraKwd2upOgsg6S3QZmgxM8aQmMY5gmI4CTBJjmC0TSCvFAigrDQvCDyG8cGU51kNEGkQeOGjJOGjgyIPCDwKU4YxOxkOaItAJLxXgXjXgGpyB+uXoVz/SR75s4h+Ow6AjZoOG2Y3N0/pv4G900sbiVW+Ya62DEADTQa7ZpXp0afTHxVQE79fb0iZ+FxGR2XZext7fce2XcSWYF2KBNg1Km/AMR406HmdzOpYlTXrZ7FsqKrFNFABJt037pje23l01ru4c6z5g3G34EDAYs03R9mR0Y/wOpPeB657Jhea2Dpiy0EJ4uM7ek9zOL52cnYdMVTRKSKBSao4VQAxLBFuNmljFW+62F2ptrl6TSbNYiS1qxUi1rkHU7tlzaef0ucVakosQQthYi9gNmu3hvmkOdVyhensOtiQGJHSNJpNJZboN9ImJK0ES+rvm14KDr3sO6eTcrYm7BReyi51vrsH46Z33OSq2JdWzBLXFmubX2AAdAGs5jk/m43hVeq6FA+Z1UtmNvJGoA4RWrMVxB0tG7l6HzJ5LNDCplsKlQZ3Yi+W+87L2FgB/maAWmn6Ym+W4Nepq3SKYtYcLi3DWVDzhogKmRwLC9raqPq7fwDOd5c5TNV9XsqGyILADQkHpNgdQRa0wjStM88Oqdata8cqHK7Z2dzmJdmIzasEBOQE7BZbabPbPPMSLO3WZ1vKde6nM1z0DLa2hHHonIVD4x6zNb4jEQ5czPMnUyVTIAYYMiCtCZWhgyFTDEcMbQkY+72Rg0EmNePKMDLQSYoBhkRBExmiJgFoLiCijXigpbvHE2hzQx/+7VO4D2mTLzLx/8AuzeknzSnPtn0wRHE6FeZOO/0D6dP5pOnMTH/AOko66lP5o07Z9S5oGFOoTmDjvMQf8xPjJl+j3G8KY/5g+EBst6cose065fo9xn7r+Z/6yQfR7i/3P8AMPywGy3px7U2G0EaAi4IuDsPVBnbDmBjLWL0f5jkd2SI/R5iv9Sj6T/JA9lvTmuQXtWXpDD+m/umlWwqZ3dxmN7AdA3DpPGa+F+j/Eo6vnonKQbBnuRvA8TbMbH17MdbHXs3GVWYw304tEconqjMNjMAdbDKg4L09M0OT+XKtNv0RJ2FlsWXtHE6bOExfyobPZ7euBXxhIyKci7yu07/AFwmYntrETHTtV+kNwbPSUhdGyEk34AbCei+kxucfKqVsUHQnL+Tomwgq2dmKlTqDsmFh6ipotltqOvebyrjMUFGZLM1xm6bA269szitazuhpN7TG2W4cQNQdhJHwHGGtQiyHXaQezj0Tm6XK67CDr7Zp08cjrYsN9ppFolnNZa4ra6m5GnXttpCNffboPxmcuJBG7r3nriatpodlx2StxbV2rXJGluI29G3ubvlLF1Dkdr2YKjLbiDfb2SA1zx/A3+qVa9ewIvtGsmbKiqvylX2/aAfttYzCvNnD4F65KqVGVR4zXtt2aA67e4yyvNKr/qU+9/lmNpzK8YhzwhAzol5m1j9el6T/JJ15kV91Sl6T/JEiYcyDDBnTJzExJ+vR9N/kko5hYnz6Ppv8keGcxLlop1X5g4rzqPpt8kf8wMV51H02+SPCdsuTvGM608wMX51H+Y3yQH5iYv9z/MPywwMS5QwDOobmNi/3X8wfCRvzJxf7v8AmD4QwqIc1FOh/MzF8Kf8xYoYPD0jEVKgBc4isQNcqCjs6Bkvp1yZefOCGjLUB6//AGnN47yW6j7JyuO8s9c5K61nfOjV6gOfOA/ed5+eGvPfAcX7z808gbf1/CE3vHvj89k+Cr2JeemA4t23+MkHPHk/zvUZ44smSE69jjQq9fHO7k/zx6J+EIc7eT/PX0T8J5ANoiXbF8i5/Ho9f/Ovk7z09E/LF+c/J3np6B+WePL5R6h74Zh8i3o/jUevfnPyd56eiflnN84U5MrkulRlchiRTNgSFJBKOttTwtOGkuD8s/dM0rq2mcItpVrE4U8RhWXUFT3j4yp+UW8pfhNjF7FmDjN/X8J02jDmrOVgVUO3r/FpMMRSGipm69kwK22TYfb+OMnKtsNWojPtCqOA2yFuTgPGzWtqbbhIaX47pbf9VU+40I5BnoMlPPZywAJ2W1+EpJym44zsD+pb7p9k4NplWZw1vHK7/tCL8ruRw6t0oiEI90od5gq2CRAoZW4lhqTxOku0+UMFvydw+E4Snth7+2ZeafTXxxLvl5UwI8w9g+ElTlzAj6qdw+E88XbDk+ex+Or0dOceAH1V7pKvOjA8B3CeZwf8Q+RYeGr1D87cCN39IhLzwwPA9w+M8raGm0dRleaw8NXqOI544H6iH+ID3GJuemA3I3orfvzTzB4/wi89h4avRhz0wnmt2AfGV6nL+GxDgJ4QEA3s7Ivcj6nsnn598lwPlr1wnVtgRo1y73MnF/5lT5opzsUx8tl+Or//2Q==" alt="" />
                            <div class="card-body p-4">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">Science</div>
                                <a class="text-decoration-none link-dark stretched-link" href="#" target="_blank">
                                    <h5 class="card-title mb-3">John</h5>
                                </a>
                                <p class="card-text mb-0"><small>Registered Since 2000</small></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <?php include('inc/footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>