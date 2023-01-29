import axios from 'axios';

const instance = axios.create({
    baseURL: `${ _chwURL_ }/wp-json/`
});

const pageId = `${_chwPageID_}`;

export {instance, pageId};

