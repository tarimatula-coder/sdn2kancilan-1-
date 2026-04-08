<footer class="footer">
    <div class="container-fluid">
        <div class="row text-muted">
            <div class="col-6 text-start">
                <p class="mb-0">
                    <a class="text-muted" href="https://adminkit.io/" target="_blank">
                        <strong>Sdn2kancilan</strong>
                    </a> &copy;
                </p>
            </div>
        </div>
    </div>
</footer>
<style>
    /* ===== ANIMASI GRADASI FOOTER ===== */
    @keyframes footerGradient {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    /* ===== FOOTER ===== */
    .footer {
        background: linear-gradient(90deg,
                #0f766e,
                /* hijau */
                #0ea5e9,
                /* biru */
                #1d4ed8,
                /* biru tua */
                #22c55e
                /* hijau cerah */
            ) !important;

        background-size: 400% 400% !important;
        animation: footerGradient 16s ease-in-out infinite !important;
        border-top: none;
        padding: 15px 0;
    }

    /* ===== TEKS FOOTER ===== */
    .footer,
    .footer a,
    .footer p,
    .footer li {
        color: #ffffff !important;
    }

    /* ===== LINK TANPA HOVER ===== */
    .footer a:hover {
        color: #ffffff !important;
        text-decoration: none;
    }

    /* ===== GARIS HALUS ===== */
    .footer .row {
        align-items: center;
    }
</style>