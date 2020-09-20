<div>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 60px;
            border: 1px solid #888;
            width: 80%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    </head>

    <body>

        <button type="button" id="site-register-btn" class="btn btn-block login-button">
            Proceed
        </button>

        <!-- The Modal -->
        <div id="site-register-modal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Name your site</h2>
                        <p class="card-text">
                            Give your new site a title to let people know what your site is about. A good title
                            introduces your brand and the primary topics of your site.
                        </p>
                        <div id="searchBox" class="form-group form-group-default">
                            <div class="controls">
                                <input type="text" name="site_id" id="email" placeholder="Search ..."
                                    class="form-control" oninput="searchDnsRecordExisntense(this)">
                            </div>

                        </div>
                        <div id="searchSpinner" class="spinner-border" style="display: none;" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>

                    </div>
                </div>
                <button type="submit" class="btn btn-block login-button pull-right">
                    <span class="signingin hidden"><span class="voyager-refresh"></span> Sending...</span>
                    <span class="signin">Finish</span>
                </button>
            </div>

        </div>

        <script>
            // Get the modal
            var modal = document.getElementById("site-register-modal");

            // Get the button that opens the modal
            var btn = document.getElementById("site-register-btn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal 
            btn.onclick = function () {
                modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function () {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }

            function searchDnsRecordExisntense(ev) {
                var name = ev.value;
                document.getElementById("searchBox").style = 'border: 2px solid rgb(122 134 146)'
                document.getElementById("searchSpinner").style = 'display:block'
                fetch(`{{ route('site.rest.domain.fetch') }}?name=${name.toLowerCase()}`)
                    .then((resp) => resp.json())
                    .then(function (data) {
                        document.getElementById("searchSpinner").style = 'display:none'
                        if (data === undefined || data.length == 0) {
                            document.getElementById("searchBox").style = 'border: 2px solid rgba(93, 251, 4, 0.97)'
                        } else if (data.length > 0) {
                            document.getElementById("searchBox").style = 'border: 2px solid rgba(218, 18, 18, 0.96)'
                        } else {
                            document.getElementById("searchBox").style = 'border: 2px solid rgba(218, 18, 18, 0.96)'
                        }
                    })
                    .catch(function (error) {
                        // If there is any error you will catch them here
                        document.getElementById("searchSpinner").style = 'display:none'
                        document.getElementById("searchBox").style = 'border: 2px solid rgba(218, 18, 18, 0.96)'
                    });
            }
        </script>
</div>