    <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Promotores</h3>



                  <div class="box-tools pull-right">
                  <form class="form-inline">
                    <div class="form-group">
                      <label>Seleccionar Año: </label>
                      <select class="form-control input-sm" id="select_year">
                        <?php
                        for ($i = 2015; $i <= 2065; $i++) {
                          $selected = ($i == $year) ? 'selected' : '';
                          echo "
                            <option value='" . $i . "' " . $selected . ">" . $i . "</option>
                          ";
                        }
                        ?>
                      </select>
                    </div>
                  </form>
                </div>



                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg"><?php echo $totalr; ?></span>
                    <span>Pacientes</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 33.1%
                    </span>
                    <span class="text-muted">Since last month</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Este año
                  </span>

                  <!-- <span>
                    <i class="fas fa-square text-gray"></i> Last year
                  </span> -->
                </div>
              </div>
            </div>
            <!-- /.card -->

