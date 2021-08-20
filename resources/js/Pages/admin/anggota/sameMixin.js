export default {
    methods: {
        verifikasi({ row }) {
            this.$q
                .dialog({
                    message: `Apa anda yakin ingin memverifikasi ${row.name}?`,
                    persistent: true,
                    cancel: true,
                })
                .onOk(() => {
                    this.$axios
                        .post(`/admin/anggota/verify-email/${row.id}`)
                        .then((result) => {
                            this.$q
                                .dialog({
                                    title: "Berhasil !",
                                    message: `Email behasil terverifikasi`,
                                    ok: true,
                                })
                                .onOk(this.loadAnggota);
                        })
                        .catch((err) => {
                            this.$q
                                .dialog({
                                    title: "Error !",
                                    message: `Email gagal terverifikasi`,

                                    ok: "Verifikasi ulang",
                                    cancel: true,
                                })
                                .onOk(() => {
                                    this.verifikasi({ row });
                                });
                        });
                });
        },
        resendEmail({ row }) {
            const dialog = this.$q.dialog({
                message: "Mengirim link verifikasi",
                progress: true,
                persistent: true,
                ok: false,
            });

            this.$axios
                .post(`/admin/anggota/resend-email/${row.id}`)
                .then((result) => {
                    dialog
                        .update({
                            title: "Berhasil !",
                            message: `Email behasil terkirim ke ${row.email}`,
                            progress: false,
                            ok: true,
                        })
                        .onOk(this.loadAnggota);
                })
                .catch((err) => {
                    dialog
                        .update({
                            title: "Error !",
                            message: `Email gagal terkirim ke ${row.email}`,
                            progress: false,
                            ok: "Kirim ulang",
                            cancel: true,
                        })
                        .onOk(() => {
                            this.resendEmail({ row });
                        });
                });
        },
    },
};
