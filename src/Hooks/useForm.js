import { useState, useEffect } from 'react'

const useForm = (callback, validate, formValues) => {
  const [values, setValues] = useState(formValues)
  const [errors, setErrors] = useState({})
  const [isTouched, setIsTouched] = useState({})
  const [isSubmitting, setIsSubmitting] = useState(false)
  const [enableSubmit, setEnableSubmit] = useState(true)

  useEffect(() => {
    if (Object.keys(errors).length === 0 && isSubmitting) {
      callback()
    }
  }, [errors])

  const chechFormFieldMatchs = () => {
    if (Object.keys(formValues).length === Object.keys(isTouched).length) {
      setEnableSubmit(false)
    } else {
      setEnableSubmit(true)
    }
  }

  const handleSubmit = (event) => {
    console.log(event.target)
    if (event) event.preventDefault()

    setIsSubmitting(true)
    setErrors(validate(values, isTouched, isSubmitting))
  }

  const handleChange = (event) => {
    // console.log(event.target.name + ':' + event.target.value)
    //While User Changes
    event.persist()
    setIsTouched((isTouched) => ({ ...isTouched, [event.target.name]: true }))
<<<<<<< HEAD

    setValues((values) => ({
      ...values,
      [event.target.name]: event.target.value,
=======
    setValues((values) => ({
      ...values,
      [event.target.name]:true,
>>>>>>> 09e30f5f2b9baec619b08b4edc4723eaf74e5031
    }))
  }

  const onFocus = (event) => {
    event.persist()
    setIsTouched((isTouched) => ({ ...isTouched, [event.target.name]: true }))
    chechFormFieldMatchs()
  }

  const onBlur = (event) => {
    event.persist()
    setIsSubmitting(false)
    setIsTouched((isTouched) => ({ ...isTouched, [event.target.name]: true }))
    setErrors(validate(values, isTouched))
    chechFormFieldMatchs()
  }


  return {
    handleChange,
    handleSubmit,
    onFocus,
    isTouched,
    values,
    errors,
    enableSubmit,
    onBlur
  }
}

export default useForm
