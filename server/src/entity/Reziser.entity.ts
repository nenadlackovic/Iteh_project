import {Column, Entity, Index, OneToMany, PrimaryGeneratedColumn} from "typeorm";
import {Film} from "./Film.entity";
import {IsInt, IsString} from "class-validator"

@Entity()
@Index(["imeRezisera", "prezimeRezisera"], { unique: true })
export class Reziser{
    @PrimaryGeneratedColumn()
    @IsInt()
    ReziserId: number;

    @Column()
    @IsString()
    imeRezisera: string;

    @Column()
    @IsString()
    prezimeRezisera: string;

    @OneToMany(type => Film, film => film.reziser)
    filmovi: Film[];
}