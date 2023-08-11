<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('partials/head.php') ?>
  </head>
           <?php $this->load->view('partials/sidebar.php') ?>

        <!-- top navigation -->
       <?php $this->load->view('partials/topbar.php') ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
            <h2><center>  </center></h2>
          <!-- /top tiles -->

          <div class="row">


            <div class="col-md-4 col-sm-4 ">
              <div class="x_panel tile fixed_height_300">
                <div class="x_title">
                  <h2><center> Last Quotation </center></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <h4><center> 32 </center></h4>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>

            <div class="col-md-4 col-sm-4 ">
              <div class="x_panel tile fixed_height_300">
                <div class="x_title">
                  <h2><center> Last Invoice </center></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <h4><center> 32 </center></h4>
                    <div class="clearfix"></div>
                  </div>
              </div>
            </div>

            <div class="col-md-4 col-sm-4 ">
              <div class="x_panel tile fixed_height_300">
                <div class="x_title">
                  <h2> Last Purchase Order </h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <h4><center> 32 </center></h4>
                    <div class="clearfix"></div>
                  </div>
              </div>
            </div>
          </div>
          <br />

          <table border="3" height="200px" >
            <tr style="background-color: #FFE87C; border-bottom: solid 2px; ">
              <th width="300px">
                <center> <font color="black">
                  History Of Quotation </font>
                </center>
              </th>
              <th width="300px">
                <center> </center>
              </th>
              <th width="300px">
                <center> </center>
              </th>
            </tr>
            <tr>
              <td width="300px">
                <center> &nbsp </center>
              </td>
              <td width="300px">
                <center>  </center>
              </td>
              <td width="300px">
                <center>  </center>
              </td>
            </tr>
            <tr>
              <td width="300px">
                <center> &nbsp </center>
              </td>
              <td width="300px">
                <center>  </center>
              </td>
              <td width="300px">
                <center>  </center>
              </td>
            </tr>
            <tr>
              <td width="300px">
                <center> &nbsp </center>
              </td>
              <td width="300px">
                <center>  </center>
              </td>
              <td width="300px">
                <center>  </center>
              </td>
            </tr>
            <tr>
              <td width="300px">
                <center> &nbsp </center>
              </td>
              <td width="300px">
                <center>  </center>
              </td>
              <td width="300px">
                <center>  </center>
              </td>
            </tr>
          </table>

          <br />

         
          <br />
          
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php $this->load->view('partials/footer.php') ?>
        <!-- /footer content -->
      </div>
    </div>
    <?php $this->load->view('partials/js.php') ?>
  </body>
</html>
