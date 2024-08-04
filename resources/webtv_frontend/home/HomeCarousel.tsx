import { define } from "hybrids";
import { useEffect, useState } from "react";
import { createRoot } from "react-dom/client";
import Carousel from "react-multi-carousel";
import "react-multi-carousel/lib/styles.css";

type CarouselType = {
	data: string;
};

type ParsedDataType = {
	date: string;
	image: string;
	url: string;
	title: string;
	id: string;
	categories: string[];
};

const Card = ({ data }: { data: ParsedDataType }) => {
	const { date, image, title, url, categories, id } = data;
	return (
		<a
			href={url}
			className="block bg-gray-50 hover:opacity-85 mx-2 p-1 rounded-lg h-[20rem] lg:h-[27rem] hover:text-blue-800"
			title={title}
		>
			<img src={image} alt="" className="w-full h-[60%] object-contain" />
			<strong className="block my-2 font-semibold text-sm lg:text-xl">
				<em>{date}</em>
			</strong>
			<p className="text-xl lg:text-4xl">{title}</p>
			{categories.map((category) => (
				<span
					className="mx-1 my-2 badge badge-neutral lg:badge-lg"
					key={Number.parseInt(id)*Math.random()}
				>
					{category}
				</span>
			))}
		</a>
	);
};

const HomeCarousel = ({ data }: CarouselType) => {
	const responsive = {
		desktop: {
			breakpoint: { max: 3000, min: 1024 },
			items: 1,
			slidesToSlide: 1,
		},
		tablet: {
			breakpoint: { max: 1024, min: 710 },
			items: 2,
			slidesToSlide: 1,
		},
		mobile: {
			breakpoint: { max: 640, min: 0 },
			items: 1,
			slidesToSlide: 1, // optional, default to 1.
		},
	};

	const [cards, setCards] = useState<JSX.Element[]>([]);

	useEffect(() => {
		const parsedData = JSON.parse(data) as ParsedDataType[];

		const cards = parsedData.map((d) => {
			return <Card data={d} key={d.id} />;
		});

		setCards(() => cards);
	}, [data]);

	return (
		<Carousel
			className="z-10 h-full"
			swipeable={true}
			draggable={true}
			showDots={true}
			responsive={responsive}
			/* ssr={true}  */ // means to render carousel on server-side.
			infinite={true}
			autoPlay={false}
			autoPlaySpeed={4000}
			keyBoardControl={true}
			transitionDuration={500}
			containerClass="carousel-container"
			/* removeArrowOnDeviceType={["tablet", "mobile"]} */
			/* deviceType={this.props.deviceType} */
			dotListClass="custom-dot-list-style  -translate-y-14"
			itemClass="carousel-item-padding-40-px"
		>
			{cards}
		</Carousel>
	);
};

type HomeCarouselElementType = {
	isOk: object;
} & CarouselType;

define<HomeCarouselElementType>({
	tag: "home-carousel",
	data: "",
	isOk: {
		value: () => "home_carousel",

		connect(host) {
			const { data } = host;
			createRoot(host).render(<HomeCarousel data={data} />);

			return () => {
				createRoot(host).unmount();
			};
		},
	},
});
