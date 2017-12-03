                        <table width="100%" border="1px">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NOMOR SPPD</th>
                                            <th>KANTOR TUJUAN</th>
                                            <th>TANGGAL MULAI</th>
                                            <th>TANGGAL SELESAI</th>
                                            <th>JUMLAH HARI</th>
                                            <th>AKSI</th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $dari = $this->input->post('dari');
                                        $sampai = $this->input->post('sampai');
                                        ?>
                                       <?php 
                                          $no=1;             
                                    $query = $this->db->query("SELECT * FROM pengajuan_sppd WHERE tanggal_post between '$dari' and '$sampai'
                                         ORDER BY id_sppd DESC");
                                        foreach ($query->result() as $row){ 
                                            ?>
                                        <tr>
                                            <td align="center"><?php echo $no; ?></td>
                                            <td align="center"><?php echo $row->nomor; ?></td>
                                            <td align="center"><?php echo $row->nippos_pegawai; ?></td>
                                            <td align="center"><?php echo $row->kantor_asal; ?></td>
                                            <td align="center"><?php echo $row->kantor_tujuan; ?></td>
                                            <td align="center"><?php echo dateIndo1($row->tanggal_post); ?></td>
                                        </tr>
                                            </tr> 
                                            <?php
                                    $no++;
                                } ?><tr>
                                    <td colspan="6">Dari tanggal <b><?php echo dateIndo($dari); ?></b> sampai tanggal <b><?php echo dateIndo($sampai); ?></b>
                                </tr>
                                    </tbody>
                                </table>