 
            let general_data, contacts_data;
            let general_s_form = document.getElementById('general_s_form');

            let site_title_inp = document.getElementById('site_title_inp');
            let site_about_inp = document.getElementById('site_about_inp');

            let contacts_s_form = document.getElementById('contacts_s_form');

            function get_general() {
                let site_title = document.getElementById('site_title');
                let site_about = document.getElementById('site_about');

                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/settings_crud.php", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onload = function () {
                    if (this.status >= 200 && this.status < 300) {
                        try {
                            general_data = JSON.parse(this.responseText);
                            console.log(general_data);

                            site_title.innerText = general_data.site_title;
                            site_about.innerText = general_data.site_about;

                            site_title_inp.value = general_data.site_title;
                            site_about_inp.value = general_data.site_about;

                        } catch (e) {
                            console.error("Error parsing JSON:", e);
                            console.log("Response:", this.responseText);
                        }
                    } else {
                        console.error("Failed to load data. Status:", this.status);
                    }
                };

                xhr.send('action=get-general');
            }

            general_s_form.addEventListener('submit', function(e){
                e.preventDefault();
                upd_general(site_title_inp.value, site_about_inp.value);
            })

            function upd_general() {
                let site_title_val = document.getElementById('site_title_inp').value;
                let site_about_val = document.getElementById('site_about_inp').value;

                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/settings_crud.php", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onload = function () {
                    var myModal = document.getElementById('general-s');
                    var modal = bootstrap.Modal.getInstance(myModal);
                    modal.hide();
                    
                    var response = JSON.parse(this.responseText);

                    if (response.result == 1) {
                        alert('success', 'Changes Saved!');
                        get_general();
                    } else {
                        alert('error', 'No Changes Made!');
                    }
                };

                xhr.send('action=upd_general&site_title=' + encodeURIComponent(site_title_val) + '&site_about=' + encodeURIComponent(site_about_val));
            }

            function get_contacts() {
                let contacts_p_id = ['address', 'gmap', 'pn1', 'pn2', 'email', 'fb', 'ig', 'tw'];
                let iframe = document.getElementById('iframe');

                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/settings_crud.php", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onload = function () {
                    if (this.status >= 200 && this.status < 300) {
                        console.log("Raw: ", this.responseText);
                        try {
                          contacts_data = JSON.parse(this.responseText);
                          contacts_data = Object.values(contacts_data);

                            for (let i = 0; i < contacts_p_id.length; i++) {
                                document.getElementById(contacts_p_id[i]).innerText = contacts_data[i+1];
                            }
                            let iframeUrl = contacts_data[9]; 
                            if (iframeUrl) {
                                iframe.src = iframeUrl;
                            } else {
                                console.error("Iframe URL not found in the response data.");
                            }
                            contacts_inp(contacts_data);

                        } catch (e) {
                            console.error("Error parsing JSON:", e);
                            console.log("Response:", this.responseText);
                        }
                    } else {
                        console.error("Failed to load data. Status:", this.status);
                    }
                };

                xhr.send('action=get_contacts');
            }

            function contacts_inp(data) {
                let contacts_inp_id = ['address_inp', 'gmap_inp', 'pn1_inp', 'pn2_inp', 'email_inp', 'fb_inp', 'ig_inp', 'tw_inp', 'iframe_inp'];

                for (let i = 0; i < contacts_inp_id.length; i++) {
                    document.getElementById(contacts_inp_id[i]).value = data[i+1];
                }
            }

            contacts_s_form.addEventListener('submit', function(e) {
                e.preventDefault();
                upd_contacts();
            })

            function upd_contacts(){
                let index = ['address', 'gmap', 'pn1', 'pn2', 'email', 'fb', 'ig', 'tw', 'iframe'];
                let contacts_inp_id = ['address_inp', 'gmap_inp', 'pn1_inp', 'pn2_inp', 'email_inp', 'fb_inp', 'ig_inp', 'tw_inp', 'iframe_inp'];
                let data_str = "";

                for (let i = 0; i < index.length; i++) {
                data_str += index[i] + "=" + encodeURIComponent(document.getElementById(contacts_inp_id[i]).value) + '&';
                }
                data_str += "action=upd_contacts";

                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/settings_crud.php", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onload = function(){
                    var myModal = document.getElementById('contact-s');
                    var modal = bootstrap.Modal.getInstance(myModal);
                    modal.hide();

                    if (this.status >= 200 && this.status < 300) {
                        console.log("Response:", this.responseText);
                        var response = JSON.parse(this.responseText);
                        if (response.result == 1) {
                            alert('success', "Changes Saved!");
                            get_contacts();
                        } else {
                            alert('error', "No Changes Saved!");
                        }
                    } else {
                        console.error("Failed to load data. Status:", this.status);
                    }
                };

                xhr.onerror = function() {
                    console.error("Network error occurred.");
                };

                xhr.send(data_str);
            }
            
            window.onload = function () {
                get_general();
                get_contacts();
            }