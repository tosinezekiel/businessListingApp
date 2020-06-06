<template>
  <div class="container">
    <div class="mt-3">
      <div class="upload text-center">
        <p class="text-center text-danger" v-show="message">{{message}}</p>
        <div v-if="validationerrors">
          <p
            class="text-center text-danger"
            v-if="validationerrors.state"
          >{{validationerrors.state[0]}}</p>
          <p class="text-center text-danger" v-if="validationerrors.lga">{{validationerrors.lga[0]}}</p>
          <p
            class="text-center text-danger"
            v-if="validationerrors.name_of_farmers"
          >{{validationerrors.name_of_farmers[0]}}</p>
          <p class="text-center text-danger" v-if="validationerrors.tel">{{validationerrors.tel[0]}}</p>
          <p
            class="text-center text-danger"
            v-if="validationerrors.farm_coordinates"
          >{{validationerrors.farm_coordinates[0]}}</p>
          <p
            class="text-center text-danger"
            v-if="validationerrors.date_time_of_inspection"
          >{{validationerrors.date_time_of_inspection[0]}}</p>
          <p
            class="text-center text-danger"
            v-if="validationerrors.google_map_link"
          >{{validationerrors.google_map_link[0]}}</p>
          <p
            class="text-center text-danger"
            v-if="validationerrors.total_ha_cultivated"
          >{{validationerrors.total_ha_cultivated[0]}}</p>
          <p
            class="text-center text-danger"
            v-if="validationerrors.type_of_operation_done"
          >{{validationerrors.type_of_operation_done[0]}}</p>
          <p
            class="text-center text-danger"
            v-if="validationerrors.quality_of_land_preparation"
          >{{validationerrors.quality_of_land_preparation[0]}}</p>
          <p
            class="text-center text-danger"
            v-if="validationerrors.stage_of_crop_growth"
          >{{validationerrors.stage_of_crop_growth[0]}}</p>
          <p
            class="text-center text-danger"
            v-if="validationerrors.farmsite_contigousness"
          >{{validationerrors.farmsite_contigousness[0]}}</p>
          <p
            class="text-center text-danger"
            v-if="validationerrors.farmers_image"
          >{{validationerrors.date_time_of_inspection[0]}}</p>
        </div>
      </div>
      <div class="upload text-center" v-if="uploading">
        <img class="text-center" :src="'//'+host+'/img/uploader.gif'" />
        <br />
        <small class="text-center">Uploading excel data, please wait...</small>
      </div>
      <div v-else class="card-header">
        <p>Data Capturing -> Please pay attention to error messages</p>
        <div class="item-wrapper one">
          <div class="item">
            <form data-validation="true" @submit.prevent="uploadExcel " id="formHandler">
              <div class="item-inner">
                <div class="item-content">
                  <div class="image-upload">
                    <label style="cursor: pointer;" for="file_upload">
                      <img src alt class="uploaded-image" />
                      <div class="h-100">
                        <div class="dplay-tbl">
                          <div class="dplay-tbl-cell">
                            <i class="fa fa-cloud-upload"></i>
                            <h5>
                              <b>Choose Excel sheet</b>
                            </h5>
                            <i class="ti-export"></i>
                            <!-- <h6 class="mt-10 mb-70">Or Drop You</h6> -->
                          </div>
                        </div>
                      </div>
                      <!--upload-content-->
                      <input
                        v-if="$store.getters['user/isAdmin']"
                        type="file"
                        name="file"
                        id="file_upload"
                        value
                        v-on:change="getFileUrl"
                      />
                    </label>
                  </div>
                </div>
                <!--item-content-->
              </div>
              <!--item-inner-->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template> 
<script>import {postRequestHandler} from './../../plugins/querybuilder'
import toastNotif from './../../plugins/alert'
import { redirect } from '../../plugins/utilities'
export default {
    data(){ 
        return{ 
            excelfile :'',
             uploading:false, 
             message:'',
              error:{}, 
              host:'', 
              validationerrors:[] 
        }
    },
    mounted(){ 
        this.host = window.location.host
        },
    methods:{
         getFileUrl(e){ 
             var files = e.target.files; 
             this.excelfile = files[0]; 
             this.uploadExcel() 
            }, 
        uploadExcel(){ 
            const form = new FormData(document.getElementById('formHandler')) 
            this.uploading = true 
            this.message = '' 
            this.validationerrors = ''
             axios.post('/uploader',form).then(res=>{ 
                 this.uploading = false 
                 toastNotif('success','all data uploaded',3000) 
                 this.$router.push({name:'indexBeneficiary'}) // 
                console.log(res) 
             }).catch(err=>{ 
                 this.uploading = false 
                 if (err.response.status === 422) { 
                     toastNotif('error', 'There was a validation errors in the excel uploaded...')
                    this.message = ''
                     this.validationerrors = err.response.data.errors 
                } else if (err.response.status === 417) { 
                    this.validationerrors = ''
                     this.message = err.response.data.message 
                     toastNotif('error', this.message) 
                } else if (err.response.status === 400) {
                     this.validationerrors = [] 
                     this.message = err.response.data.message 
                     toastNotif('error', this.message)
                 } else { 
                     toastNotif('error', 'Sorry the server could not handle your request. Try again later') 
                } 
                
            }) 
        } 
        },
    }
    </script>