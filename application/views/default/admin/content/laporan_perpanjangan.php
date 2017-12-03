                        <table width="100%" border="1px">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NOMOR SPPD</th>
                                            <th>KANTOR TUJUAN</th>
                                            <th>TANGGAL MULAI</th>
                                            <th>TANGGAL SELESAI</th>
                                            <th>JUMLAH HARI</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $dari = $this->input->post('dari');
                                        $sampai = $this->input->post('sampai');
                                        ?>
                                       <?php 
                                          $no=1;             
                                            $query = $this->db->query("SELECT 
                                            perpanjangan.id_perpanjangan AS id_perpanjangan,
                                            perpanjangan.id_sppd AS id_sppd,
                                            perpanjangan.kantor_tujuan AS kantor_tujuan,
                                            perpanjangan.tanggal_mulai AS tanggal_mulai,
                                            perpanjangan.perpanjangan_post AS perpanjangan_post ,
                                            perpanjangan.tanggal_selesai AS tanggal_selesai,
                                            perpanjangan.jumlah_hari AS jumlah_hari,
                                            pengajuan_sppd.id_sppd AS id_sppd,
                                            pengajuan_sppd.nomor AS nomor
                                            FROM perpanjangan
                                            LEFT JOIN pengajuan_sppd ON pengajuan_sppd.id_sppd=perpanjangan.id_sppd
                                            WHERE perpanjangan_post between '$dari' and '$sampai'
                                         ORDER BY perpanjangan.id_perpanjangan DESC");
                                        foreach ($query->result() as $row){ 
                                            ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td align="center"><?php echo $row->nomor; ?></td>
                                            <td align="center"><?php echo $row->kantor_tujuan; ?></td>
                                            <td align="center"><?php echo $row->tanggal_mulai; ?></td>
                                            <td align="center"><?php echo $row->tanggal_selesai; ?></td>
                                            <td align="center"><?php echo $row->jumlah_hari; ?> Hari</td>
                                        </tr>
                                            <?php
                                    $no++;
                                } ?><tr>
                                    <td colspan="6">Dari tanggal <b><?php echo dateIndo($dari); ?></b> sampai tanggal <b><?php echo dateIndo($sampai); ?></b>
                                </tr>
                                    </tbody>
                                </table>