<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  margin-bottom: 33px;
}

.price {
  color: #172b4d;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #212529;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}
.card img{
    width: 350px;
    height: 168px;
}
.card button:hover {
  opacity: 0.7;
}</style>
<body>
        <div class="heroblock" style="background-position: top;background-attachment: fixed;background-image: url(https://steamcdn-a.akamaihd.net/steam/apps/356190/page_bg_generated_v6b.jpg?t=1538497118);
        position: relative;
        margin-bottom: 50px;
        padding-top: 120px;
        padding-bottom: 170px;
        text-align: center;
        background-repeat: no-repeat;
        background-position: center center;
        -webkit-background-size: cover;
        background-size: cover">
            <h6 style="color: #fff;">เว็บไซต์ระบบประเมิน</h6>
            <h1 class="display-1" style="color: #fff;">มหาวิทยาลัยเกษตรศาสตร์</h1>
        </div>
        <div class="Block Middle" style="width: 1110px; margin:auto;">
                <h1 class="display-4" style="color: #283346;">_ การอบรมที่กำลังจะถึง</h1>
                <div class="container">
                    <div class="row">     
                        <?php
                            $this->db->select('TrainingID, TrainingName,Lecturer');                                        
                            $province = $this->db->get('training');                                        
                              foreach($province->result_array() as $d)
                                {
                                ?>                        
                                    <div class="card" style="width:298px; height:351px;">
                                    <img src="https://steamcdn-a.akamaihd.net/steam/apps/814380/header.jpg?t=1554918884" alt="Denim Jeans" style="width:100%">
                                    <h3><?=trim($d['TrainingName'])?></h3>
                                    <h6><?=trim($d['Lecturer'])?></h6>
                                    
                                    <h6><button value="<?=trim($d['TrainingID'])?>" onclick="location.href='<?php echo base_url();?>index.php/trainer/<?=$d['TrainingID']?>'">>รายละเอียด...</button></h6>
                                    </div>      
                                <?php
                                }
                                ?>
                    </div>
                </div>
                   <!------------------------------------------------------------------------------------------------------>
                   
        </div>
</body>

</html>