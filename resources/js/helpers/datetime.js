import moment from 'moment'

export function fromNow (date) {
    return moment(date).locale('vi').fromNow()
}
