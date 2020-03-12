/*
===============================
HANDLER FOR HTTP REQUESTS
===============================
*/

import axios from "axios"
import { ModalBus } from '@/js/eventbus';
import Alert from '@/js/components/Alert';

const HTTP = axios.create({
  
})


export default {

  get(url, parameters) {
    return HTTP.get(url, parameters)
    .then(response => {
       if(response.data.error) {
          ModalBus.$emit('open', {
            component: Alert,
            props: { text: response.data.message, type: 'error' }
          })
       } else {
         return response;
       }
    })
    .catch(e => {      
      ModalBus.$emit('open', {
        component: Alert,
        props: { text: 'CONNECTION PROBLEM', type: 'error' }
      })
      return this.errors.push(e)
    })
  },


  delete(url, parameters) {
    return HTTP.delete(url, parameters)
    .then(response => {
       if(response.data.error) {
          ModalBus.$emit('open', {
            component: Alert,
            props: { text: response.data.message, type: 'error' }
          })
       } else {
         return response;
       }
    })
    .catch(e => {      
      ModalBus.$emit('open', {
        component: Alert,
        props: { text: 'CONNECTION PROBLEM', type: 'error' }
      })
      return this.errors.push(e)
    })
  }

}