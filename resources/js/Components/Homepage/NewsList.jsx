import React from "react";

const NewsList = ({ news }) => {
    const handlePinjamBuku = (book) => {
        console.log("Buku", book, "dipinjam!");
    };

    const isNews = () => {
        return news.map((data, i) => (
            <div key={i} className="card w-full lg:w-96 bg-base-100 shadow-xl">
                <figure>
                    <img src={"/storage/" + data.gambar} alt="Buku" />
                </figure>
                <div className="card-body">
                    <h2 className="card-title">{data.judul}</h2>
                    <p>{data.sinopsis}</p>
                    <div className="card-actions justify-end">
                        <div className="badge badge-outline">
                            {data.kategori.nama}{" "}
                        </div>
                        <div className="badge badge-outline">
                            {data.pengarang}
                        </div>
                        <button
                            onClick={() => handlePinjamBuku(data)}
                            className="btn btn-primary"
                        >
                            Detail Buku
                        </button>
                    </div>
                </div>
            </div>
        ));
    };

    const noNews = () => <div>Saat ini belum ada buku tersedia</div>;

    return news && news.length > 0 ? isNews() : noNews();
};

export default NewsList;

// import React from "react";

// const isNews = (news) => {
//     return news.map((data, i) => {
//         return (
//             <div key={i} className="card w-full lg:w-96 bg-base-100 shadow-xl">
//                 <figure>
//                     <img src={"/storage/" + data.gambar} alt="Buku" />
//                 </figure>
//                 <div className="card-body">
//                     <h2 className="card-title">{data.judul}</h2>
//                     <p>{data.sinopsis}</p>
//                     <div className="card-actions justify-end">
//                         <div className="badge badge-inline">
//                             {data.kategori}
//                         </div>
//                         <div className="badge badge-outline">
//                             {data.pengarang}
//                         </div>
//                     </div>
//                 </div>
//             </div>
//         );
//     });
// };

// const noNews = () => {
//     return <div>Saat ini belum ada buku tersedia</div>;
// };

// const NewsList = ({ news }) => {
//     return news && news.length > 0 ? isNews(news) : noNews();
// };

// export default NewsList;
