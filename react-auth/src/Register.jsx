import React, { useState } from 'react';
import axios from 'axios';

const Register = () => {
    const [formData, setFormData] = useState({
        name: '',
        email: '',
        password: '',
        confirm_password: ''
    });
    const [message, setMessage] = useState({ text: '', type: '' });
    const [isLoading, setIsLoading] = useState(false);

    const handleChange = (e) => {
        setFormData({ ...formData, [e.target.name]: e.target.value });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        
        // Validate Client-side đơn giản
        if (formData.password !== formData.confirm_password) {
            setMessage({ text: 'Mật khẩu xác nhận không khớp!', type: 'error' });
            return;
        }

        setIsLoading(true);
        setMessage({ text: '', type: '' });

        try {
            const response = await axios.post('/web_perfume/auth/api_register', formData);

            if (response.data.status === 'success') {
                setMessage({ text: response.data.message, type: 'success' });
                // Chuyển sang trang login sau 1.5s
                setTimeout(() => {
                    window.location.href = '/web_perfume/auth/login';
                }, 1500);
            } else {
                setMessage({ text: response.data.message, type: 'error' });
                setIsLoading(false);
            }
        } catch (error) {
            setMessage({ text: 'Lỗi kết nối server!', type: 'error' });
            setIsLoading(false);
        }
    };

    return (
        <div className="auth-wrapper">
            <div className="auth-header">
                <h2>Đăng Ký</h2>
                <p>Trở thành thành viên để nhận ưu đãi</p>
            </div>

            {message.text && (
                <div className={`alert-message alert-${message.type}`} style={{ marginBottom: '20px' }}>
                    {message.text}
                </div>
            )}

            <form onSubmit={handleSubmit}>
                <div className="form-group-auth">
                    <input type="text" name="name" className="form-control-auth" placeholder="Họ và tên" onChange={handleChange} required />
                </div>

                <div className="form-group-auth">
                    <input type="email" name="email" className="form-control-auth" placeholder="Email" onChange={handleChange} required />
                </div>

                <div className="form-group-auth">
                    <input type="password" name="password" className="form-control-auth" placeholder="Mật khẩu (tối thiểu 5 ký tự)" minLength="5" onChange={handleChange} required />
                </div>

                <div className="form-group-auth">
                    <input type="password" name="confirm_password" className="form-control-auth" placeholder="Nhập lại mật khẩu" minLength="5" onChange={handleChange} required />
                </div>

                <button type="submit" className="btn-black" disabled={isLoading}>
                    {isLoading ? 'Đang đăng ký...' : 'Đăng ký thành viên'}
                </button>
            </form>

            <div className="auth-footer">
                <span>Đã có tài khoản?</span>
                <a href="/web_perfume/auth/login">Đăng nhập</a>
            </div>
        </div>
    );
};

export default Register;