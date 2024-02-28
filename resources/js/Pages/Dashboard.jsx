import React, { useState } from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import { Inertia } from '@inertiajs/inertia';

export default function Dashboard(props) {
    const [title, setTitle] = useState('');
    const [description, setDescription] = useState('');
    const [category, setCategory] = useState('');

    const handleSubmit = () => {
        const data = { title, description, category };
        Inertia.post('/news', data);
    };


    const user = props.auth && props.auth.user;

    return (
        <AuthenticatedLayout auth={props.auth}>
            <Head title="Dashboard" />
            <div className="min-h-screen bg-gray-100 py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="p-6 bg-white border-b border-gray-200">
                        <input type="text" placeholder="Judul" className="m-2 input input-bordered w-full" onChange={(e) => setTitle(e.target.value)} />
                        <input type="text" placeholder="Deskripsi" className="m-2 input input-bordered w-full" onChange={(e) => setDescription(e.target.value)} />
                        <input type="text" placeholder="Kategori" className="m-2 input input-bordered w-full" onChange={(e) => setCategory(e.target.value)} />
                        <button className='btn btn-primary m-2' onClick={() => handleSubmit()}>SUBMIT</button>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
