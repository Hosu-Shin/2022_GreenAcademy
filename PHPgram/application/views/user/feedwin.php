<div class="d-flex flex-column align-items-center">
    <div class="size_box_100"></div>
    <div class="w100p_mw614" id="profileModal">
        <div class="d-flex flex-row">            
                <div class="d-flex flex-column justify-content-center me-3">
                    <div class="circleimg h150 w150 pointer feedwin">
                        <img data-bs-toggle="modal" data-bs-target="#newProfileModal" src='/static/img/profile/<?=$this->data->iuser?>/<?=$this->data->mainimg?>' onerror='this.error=null; this.src="/static/img/profile/uniCorn.png"'>
                    </div>
                </div>
            <div class="flex-grow-1 d-flex flex-column justify-content-evenly">
                <div><?= $this->data->email?></div>
                <div>
                    <?php
                        $youMe = $this->data->youMe;
                        $meYou = $this->data->meYou;
                        
                        if(getIuser() === $this->data->iuser) { ?>
                            <button type="button" id="btnModProfile" class="btn btn-outline-secondary">프로필 수정</button>
                    <?php } else if(($youMe === 1 && $meYou === 1) || ($youMe === 0 && $meYou === 1)) { ?>
                            <button type="button" id="btnFollow" data-follow="1" class="btn btn-outline-secondary">팔로우 취소</button>
                    <?php } else if($youMe === 0 && $meYou === 0) { ?>
                            <button type="button" id="btnFollow" data-follow="0" class="btn btn-primary">팔로우</button>
                    <?php } else if($youMe === 1 && $meYou === 0) { ?>
                        <button type="button" id="btnFollow" data-follow="0" class="btn btn-primary"">맞팔로우 하기</button>
                    <?php } ?>
            <!-- 강사님 풀이 -->
                    <div>
                    <?php 
                        if($this->data->iuser === getIuser()) {
                            echo '<button type="button" id="btnModProfile" class="btn btn-outline-secondary">프로필 수정</button>';
                        } else {
                            $data_follow = 0;
                            $cls = "btn-primary";
                            $txt = "팔로우";

                            if($this->data->meYou === 1) {
                                $data_follow = 0;
                                $cls = "btn-outline-secondary";
                                $txt = "팔로우 취소";
                            } else if($this->data->youMe === 1 && $this->data->meYou === 0) {
                                $txt = "맞팔로우 하기";
                            }
                            echo "<button type = 'button' id='btnFollow' data-follow='{$data_follow}' class='btn {$cls}'>{$txt}</button>";
                        }
                    ?>
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <div class="flex-grow-1 me-3">게시물<span>5</span></div>
                    <div class="flex-grow-1 me-3">팔로워<span>100</span></div>
                    <div class="flex-grow-1">팔로우<span>100</span></div>
                </div>
                <div class="bold"><?= $this->data->nm?></div>
                <div><?= $this->data->cmt?></div>
            </div>
        </div>
    </div>
</div>

<!-- //팔로우 기능 -->
<!-- <?php
    $youMe = $this->data->youMe;
    $meYou = $this->data->meYou;
    if(getIuser() === $this->data->iuser) {
        print "예..?";
    } else if($youMe === 1 && $meYou === 1) {
        print "팔로우 취소";
    } else if($youMe === 0 && $meYou === 1) {
        print "팔로잉";
    } else if($youMe === 1 && $meYou === 0) {
        print "팔로워";
    } else if($youMe === 0 && $meYou === 0) {
        print "팔로우";
    } 
?> -->

<!-- 프로필 사진 바꾸기 -->
<div class="modal fade" id="newProfileModal" tabindex="-1" aria-labelledby="newProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centerd modal-xl">
        <div class="modal-content rounded-3 w-30" id="newProfileModalContent">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title bold" id="newProfileModalLabel">프로필 사진 바꾸기</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body p-0" id="id-modal-body">
                    <div class="text-sm-center p-3 upColor pointer border-bottom" >사진 업로드</div>
                    <div class="text-sm-center p-3 delColor pointer" >현재 사진 삭제</div>
                </div>
                <div class="modal-footer justify-content-center">
                    <a class="btn" id="modalY" href="#">취소</a>
                </div>
            </div>
            <form class="d-none">
                <input type="file" accept="image/*" name="imgs" multiple>
            </form>
        <div>
    </div>
</div>