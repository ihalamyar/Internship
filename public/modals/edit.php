<div class="modal fade" id="authentication" tabindex="-1" aria-labelledby="authentication-modal-label" aria-hidden="true" style="display: none;" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog " role="document">
        <div class="modal-content border-0">
            <div class="modal-header modal-shape-header">
                <h5>Edit profile</h5>
                <a class="close" id="close_edit_profile_modal" data-dismiss="modal" aria-hidden="true">Close</a>
            </div>
            <div class="modal-body">
                <div class="alert alert-info" style="display:none;" role="alert" id="update_profile_message"></div>
                <form id="profileEditModal" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="profile_id" id="profile_id">
                    </div>
                    <div class="form-group">
                        <label for="profile_bio">Bio</label>
                        <input class="form-control" type="text" name="profile_bio" id="profile_bio">
                    </div>
                    <div class="form-group">
                        <label for="profile_country">Country</label>
                        <input class="form-control" type="text" name="profile_country" id="profile_country">
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="profile_age">Age</label>
                            <input class="form-control" type="text" name="profile_age" id="profile_age">
                        </div>
                        <div class="form-group">
                            <label for="profile_education">Education</label>
                            <input class="form-control" type="text" name="profile_education" id="profile_education">
                        </div>
                        <div class="form-group">
                            <label for="profile_image">Profile</label>
                            <input class="form-control" type="file" name="profile_image" id="profile_image">
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block mt-3" name="edit_profile_btn" id="edit_profile_btn">
                            Save changes
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>